<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::with('parent')
            ->where('is_delete', false)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        $parentCategories = Category::where('is_delete', false)
            ->where('is_active', true)
            ->get();

        return view('category.create', compact('parentCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        $data = $request->only(['name', 'description', 'parent_id']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        Category::create($data);

        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được tạo thành công!');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        // Get all categories except the current one and its descendants
        $excludeIds = array_merge([$category->id], $category->getAllDescendantIds());

        $parentCategories = Category::where('is_delete', false)
            ->where('is_active', true)
            ->whereNotIn('id', $excludeIds)
            ->get();

        return view('category.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_id' => 'nullable|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        // Prevent circular reference
        if ($request->parent_id) {
            $excludeIds = array_merge([$category->id], $category->getAllDescendantIds());
            if (in_array($request->parent_id, $excludeIds)) {
                return back()->withErrors(['parent_id' => 'Không thể chọn danh mục con làm danh mục cha!']);
            }
        }

        $data = $request->only(['name', 'description', 'parent_id']);
        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/categories'), $imageName);
            $data['image'] = 'uploads/categories/' . $imageName;
        }

        $category->update($data);

        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được cập nhật thành công!');
    }

    /**
     * Soft delete the specified category.
     */
    public function destroy(Category $category)
    {
        $category->update(['is_delete' => true]);

        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được xóa thành công!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use App\Models\Category;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Kiểm tra quyền admin
     */
    private function checkAdmin()
    {
        if (!Auth::check() || Auth::user()->role != 1) {
            return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập trang quản trị! Vai trò của bạn: ' . (Auth::user()->role == 0 ? 'User' : 'Không xác định'));
        }
        return true;
    }

    /**
     * Trang tổng quan
     */
    public function dashboard()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $totalNews = News::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();
        return view('admin.dashboard', compact('totalNews', 'totalCategories', 'totalUsers'));
    }

    /**
     * Quản lý tin tức - Hiển thị danh sách
     */
    public function manageNews()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $news = News::with('category')->get();
        return view('admin.news', compact('news'));
    }

    /**
     * Quản lý tin tức - Hiển thị form tạo mới
     */
    public function createNews()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $categories = Category::all();
        return view('admin.news_create', compact('categories'));
    }

    /**
     * Quản lý tin tức - Lưu tin tức mới
     */
    public function storeNews(Request $request)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.news')->with('success', 'Thêm tin tức thành công!');
    }

    /**
     * Quản lý tin tức - Hiển thị form sửa
     */
    public function editNews($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $news = News::findOrFail($id);
        $categories = Category::all();
        return view('admin.news_edit', compact('news', 'categories'));
    }

    /**
     * Quản lý tin tức - Cập nhật tin tức
     */
    public function updateNews(Request $request, $id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $news = News::findOrFail($id);
        $news->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('admin.news')->with('success', 'Cập nhật tin tức thành công!');
    }

    /**
     * Quản lý tin tức - Xóa tin tức
     */
    public function deleteNews($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('admin.news')->with('success', 'Xóa tin tức thành công!');
    }

    /**
     * Quản lý danh mục - Hiển thị danh sách
     */
    public function manageCategories()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }

    /**
     * Quản lý danh mục - Hiển thị form tạo mới
     */
    public function createCategory()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        return view('admin.categories_create');
    }

    /**
     * Quản lý danh mục - Lưu danh mục mới
     */
    public function storeCategory(Request $request)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Thêm danh mục thành công!');
    }

    /**
     * Quản lý danh mục - Hiển thị form sửa
     */
    public function editCategory($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $category = Category::findOrFail($id);
        return view('admin.categories_edit', compact('category'));
    }

    /**
     * Quản lý danh mục - Cập nhật danh mục
     */
    public function updateCategory(Request $request, $id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.categories')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Quản lý danh mục - Xóa danh mục
     */
    public function deleteCategory($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Xóa danh mục thành công!');
    }

    /**
     * Quản lý người dùng - Hiển thị danh sách
     */
    public function manageUsers()
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $users = User::all();
        return view('admin.users', compact('users'));
    }

    /**
     * Quản lý người dùng - Hiển thị form sửa
     */
    public function editUser($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $user = User::findOrFail($id);
        return view('admin.users_edit', compact('user'));
    }

    /**
     * Quản lý người dùng - Cập nhật người dùng
     */
    public function updateUser(Request $request, $id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:0,1',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users')->with('success', 'Cập nhật người dùng thành công!');
    }

    /**
     * Quản lý người dùng - Xóa người dùng
     */
    public function deleteUser($id)
    {
        if ($this->checkAdmin() !== true) {
            return $this->checkAdmin();
        }

        // Không cho phép xóa chính mình
        if ($id == Auth::id()) {
            return redirect()->route('admin.users')->with('error', 'Bạn không thể xóa chính mình!');
        }

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Xóa người dùng thành công!');
    }
}
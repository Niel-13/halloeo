<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminPortfolioController;
use App\Http\Controllers\Admin\AdminTestimonialController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\AdminServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Public
|--------------------------------------------------------------------------
*/

// Home & Static Pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');
Route::get('/layanan-kami', [ServiceController::class, 'index'])->name('services');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// Portfolio
Route::get('/portofolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portofolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');



// Testimonials
Route::post('/testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');

// Contact Form
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');


// Admin Login (No Auth Required)
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

// Admin Protected Routes (Requires Auth)
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    
    // Logout
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    
    // Portfolio Management
    Route::get('/portfolio', [AdminPortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio/create', [AdminPortfolioController::class, 'create'])->name('portfolio.create');
    Route::post('/portfolio', [AdminPortfolioController::class, 'store'])->name('portfolio.store');
    Route::get('/portfolio/{id}/edit', [AdminPortfolioController::class, 'edit'])->name('portfolio.edit');
    Route::put('/portfolio/{id}', [AdminPortfolioController::class, 'update'])->name('portfolio.update');
    Route::delete('/portfolio/{id}', [AdminPortfolioController::class, 'destroy'])->name('portfolio.destroy');
    Route::post('/portfolio/{id}/toggle-featured', [AdminPortfolioController::class, 'toggleFeatured'])
        ->name('portfolio.toggle-featured');
    
    // Route untuk Layanan (Services)
    Route::resource('services', AdminServiceController::class);

    // Testimonial Management
    Route::get('/testimonials', [AdminTestimonialController::class, 'index'])->name('testimonials.index');
    Route::get('/testimonials/pending', [AdminTestimonialController::class, 'pending'])->name('testimonials.pending');
    Route::post('/testimonials/{id}/approve', [AdminTestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('/testimonials/{id}/reject', [AdminTestimonialController::class, 'reject'])->name('testimonials.reject');
    Route::delete('/testimonials/{id}', [AdminTestimonialController::class, 'destroy'])->name('testimonials.destroy');
    
    // Contact Messages Management
    Route::get('/messages', [AdminContactController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [AdminContactController::class, 'show'])->name('messages.show');
    Route::post('/messages/{id}/read', [AdminContactController::class, 'markAsRead'])->name('messages.mark-read');
    Route::post('/messages/{id}/replied', [AdminContactController::class, 'markAsReplied'])->name('messages.mark-replied');
    Route::post('/messages/{id}/archive', [AdminContactController::class, 'archive'])->name('messages.archive');
    Route::post('/messages/{id}/notes', [AdminContactController::class, 'updateNotes'])->name('messages.update-notes');
    Route::delete('/messages/{id}', [AdminContactController::class, 'destroy'])->name('messages.destroy');
});     
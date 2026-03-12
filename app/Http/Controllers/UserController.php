<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    private $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('API_BASE_URL', 'http://localhost:3000/api');
    }

    // GET ALL USERS - /api/users
    public function index()
    {
        try {
            $response = Http::get($this->apiUrl . '/users');
            
            if ($response->successful()) {
                $data = $response->json();
                $users = $data['data'] ?? [];
                return view('users.index', compact('users'));
            }
            
            return view('users.index', ['users' => [], 'error' => 'Failed to fetch users']);
        } catch (\Exception $e) {
            return view('users.index', ['users' => [], 'error' => $e->getMessage()]);
        }
    }

    // GET USER BY ID - /api/users/id/{id}
    public function show($id)
    {
        try {
            $response = Http::get($this->apiUrl . '/users/id/' . $id);
            
            if ($response->successful()) {
                $data = $response->json();
                $user = $data['data'] ?? null;
                
                if (!$user) {
                    return redirect()->route('users.index')
                        ->with('error', 'User not found');
                }
                
                return view('users.show', compact('user'));
            }
            
            return redirect()->route('users.index')
                ->with('error', 'User not found');
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', $e->getMessage());
        }
    }

    // GET USERS BY NAME (SEARCH) - /api/users/name/{name}
    public function search(Request $request)
    {
        $name = $request->get('name');
        
        if (empty($name)) {
            return redirect()->route('users.index');
        }
        
        try {
            $response = Http::get($this->apiUrl . '/users/name/' . urlencode($name));
            
            if ($response->successful()) {
                $data = $response->json();
                $users = $data['data'] ?? [];
                
                // Add search query to session for displaying search term
                session()->flash('search_term', $name);
                
                return view('users.index', compact('users'));
            }
            
            return view('users.index', ['users' => [], 'error' => 'No users found']);
        } catch (\Exception $e) {
            return view('users.index', ['users' => [], 'error' => $e->getMessage()]);
        }
    }

    // For edit form - also uses GET by ID
    public function edit($id)
    {
        try {
            $response = Http::get($this->apiUrl . '/users/id/' . $id);
            
            if ($response->successful()) {
                $data = $response->json();
                $user = $data['data'] ?? null;
                
                if (!$user) {
                    return redirect()->route('users.index')
                        ->with('error', 'User not found');
                }
                
                return view('users.edit', compact('user'));
            }
            
            return redirect()->route('users.index')
                ->with('error', 'User not found');
        } catch (\Exception $e) {
            return redirect()->route('users.index')
                ->with('error', $e->getMessage());
        }
    }

    // Create form
    public function create()
    {
        return view('users.create');
    }

    // Store new user
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'nullable|integer|min:1|max:150',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20'
        ]);

        try {
            $response = Http::post($this->apiUrl . '/users', $request->all());
            
            if ($response->successful()) {
                return redirect()->route('users.index')
                    ->with('success', 'User created successfully');
            }
            
            $errorMessage = $response->json()['message'] ?? 'Unknown error';
            
            if (str_contains($errorMessage, 'duplicate key error') || str_contains($errorMessage, 'E11000')) {
                $errorMessage = 'A user with this email already exists. Please use a different email.';
            }
            
            return back()->with('error', $errorMessage)->withInput();
            
        } catch (\Exception $e) {
            return back()->with('error', 'Connection Error: ' . $e->getMessage())->withInput();
        }
    }

    // Update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'age' => 'nullable|integer|min:1|max:150',
            'city' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20'
        ]);

        try {
            $response = Http::put($this->apiUrl . '/users/' . $id, $request->all());
            
            if ($response->successful()) {
                return redirect()->route('users.index')
                    ->with('success', 'User updated successfully');
            }
            
            return back()->with('error', 'Failed to update user')->withInput();
            
        } catch (\Exception $e) {
            return back()->with('error', 'Connection Error: ' . $e->getMessage())->withInput();
        }
    }

    // Delete user
    public function destroy($id)
    {
        try {
            $response = Http::delete($this->apiUrl . '/users/' . $id);
            
            if ($response->successful()) {
                return redirect()->route('users.index')
                    ->with('success', 'User deleted successfully');
            }
            
            return back()->with('error', 'Failed to delete user');
        } catch (\Exception $e) {
            return back()->with('error', 'Connection Error: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
  // Menampilkan halaman profil
  public function showProfile()
  {
      return view('profile');
  }}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    // Menampilkan halaman pilihan operasi
    public function index()
    {
        return view('home');
    }

    // Menampilkan halaman perhitungan sesuai operasi yang dipilih
    public function showOperation($operation)
    {
        $operations = [
            'addition' => 'Pertambahan',
            'subtraction' => 'Pengurangan',
            'multiplication' => 'Perkalian',
            'division' => 'Pembagian'
        ];

        if (!array_key_exists($operation, $operations)) {
            return redirect()->route('home');
        }

        return view('calculator', ['operation' => $operation, 'operationName' => $operations[$operation]]);
    }

    // Melakukan perhitungan dan mengembalikan hasilnya
    public function calculate(Request $request)
    {
        $operation = $request->input('operation');
        $firstNumber = $request->input('first_number');
        $secondNumber = $request->input('second_number');

        switch ($operation) {
            case 'addition':
                $result = $firstNumber + $secondNumber;
                break;
            case 'subtraction':
                $result = $firstNumber - $secondNumber;
                break;
            case 'multiplication':
                $result = $firstNumber * $secondNumber;
                break;
            case 'division':
                $result = $secondNumber != 0 ? $firstNumber / $secondNumber : 'Tidak bisa dibagi dengan 0';
                break;
            default:
                $result = 'Operasi tidak dikenali';
        }

        return view('result', compact('result', 'firstNumber', 'secondNumber', 'operation'));
    }
}

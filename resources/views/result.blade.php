<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Perhitungan</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
        }

        h1 {
            margin-bottom: 5px;
        }

        .result {
            font-size: 60px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
        }

        .number-name {
            font-size: 24px;
            font-weight: normal;
            text-align: center;
            margin-top: 10px;
        }

        .button {
            display: inline-block;
            padding: 15px 30px; /* Increased padding for larger buttons */
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            font-size: 18px; /* Increased font size */
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .buttons-container {
            display: flex;
            justify-content: center; /* Center the buttons */
            align-items: center; /* Align items in the center */
            width: 100%; /* Full width for buttons */
            margin-top: 20px; /* Add some margin from the result text */
        }

        .back-to-calculation {
            margin-left: 10px; /* Add margin to space the buttons */
        }

        .back-to-home {
            margin-right: 10px; /* Add margin to space the buttons */
        }
    </style>
</head>

<body>
    <h1>Hasil Perhitungan</h1>
    <h1>(Calculation Result)</h1>
    <h4>Hasil dari {{ $firstNumber }} dan {{ $secondNumber }} adalah: </h4>

    <div class="result"><?php echo e($result); ?></div>

    <div class="number-name">
        <?php echo e(numberToWords($result, 'id')); ?> / <?php echo e(numberToWords($result, 'en')); ?>
    </div>

    <div class="buttons-container">
        <a class="button back-to-home" href="<?php echo e(route('home')); ?>">
            <div style="text-align: center;">
                Kembali ke halaman utama<br>
                <span style="font-size: 14px;">(Back to Home)</span>
            </div>
        </a>
        <a class="button back-to-calculation" href="{{ route('operation', $operation) }}">
            <div style="text-align: center;">
                Kembali ke perhitungan<br>
                <span style="font-size: 14px;">(Back to Calculation)</span>
            </div>
        </a>
    </div>

    <?php
    function numberToWords($number, $lang = 'id')
    {
        if ($number == 0) {
            return $lang == 'id' ? 'Nol' : 'Zero';
        }

        if ($lang == 'id') {
            return convertToWordsId($number);
        } else {
            return convertToWordsEn($number);
        }
    }

    function convertToWordsId($number)
    {
        $units = ['', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan'];
        $teens = ['Sepuluh', 'Sebelas', 'Dua belas', 'Tiga belas', 'Empat belas', 'Lima belas', 'Enam belas', 'Tujuh belas', 'Delapan belas', 'Sembilan belas'];
        $tens = ['', 'Sepuluh', 'Dua puluh', 'Tiga puluh', 'Empat puluh', 'Lima puluh', 'Enam puluh', 'Tujuh puluh', 'Delapan puluh', 'Sembilan puluh'];
        $thousands = ['', 'Ribu', 'Juta', 'Miliar', 'Triliun'];

        if ($number < 10) {
            return $units[$number];
        } elseif ($number < 20) {
            return $teens[$number - 10];
        } elseif ($number < 100) {
            return $tens[floor($number / 10)] . ' ' . $units[$number % 10];
        } elseif ($number < 1000) {
            return ($number >= 100 && $number < 200 ? 'Seratus' : $units[floor($number / 100)] . ' Ratus') . ' ' . convertToWordsId($number % 100);
        } else {
            for ($i = 0, $divider = 1000; $i < count($thousands); $i++, $divider *= 1000) {
                if ($number < $divider * 1000) {
                    return convertToWordsId(floor($number / $divider)) . ' ' . $thousands[$i] . ' ' . convertToWordsId($number % $divider);
                }
            }
        }
        return 'Angka tidak valid';
    }

    function convertToWordsEn($number)
    {
        $units = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine'];
        $teens = ['Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'];
        $tens = ['', 'Ten', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
        $thousands = ['', 'Thousand', 'Million', 'Billion', 'Trillion'];

        if ($number < 10) {
            return $units[$number];
        } elseif ($number < 20) {
            return $teens[$number - 10];
        } elseif ($number < 100) {
            return $tens[floor($number / 10)] . ' ' . $units[$number % 10];
        } elseif ($number < 1000) {
            return ($number >= 100 && $number < 200 ? 'One Hundred' : $units[floor($number / 100)] . ' Hundred') . ' ' . convertToWordsEn($number % 100);
        } else {
            for ($i = 0, $divider = 1000; $i < count($thousands); $i++, $divider *= 1000) {
                if ($number < $divider * 1000) {
                    return convertToWordsEn(floor($number / $divider)) . ' ' . $thousands[$i] . ' ' . convertToWordsEn($number % $divider);
                }
            }
        }
        return 'Invalid number';
    }
    ?>
</body>

</html>

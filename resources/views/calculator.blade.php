<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $operationName }} - KulKids</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            padding: 2px;
            box-sizing: border-box;
        }

        .container {
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
            width: 100%;
        }

        .number-input {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            text-align: right;
            border: 2px solid black;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease-in-out;
        }

        .number-input:focus {
            border-color: #007BFF;
        }

        .button-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            justify-content: center;
        }

        .button-grid button {
            padding: 20px;
            font-size: 15px;
            border-radius: 75px;
            border: none;
            transition: background-color 0.3s ease-in-out;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }

        button {
            cursor: pointer;
        }

        .button-grid button:hover {
            background-color: #ddd;
        }

        .clear-button {
            background-color: red;
            color: white;
            padding: 20px;
            width: calc(100% - 10px);
            border: none;
            font-size: 15px;
            transition: background-color 0.3s ease-in-out;
            border-radius: 75px;
        }

        .clear-button:hover {
            background-color: darkred;
        }

        .button-label {
            display: block;
            font-size: 12px;
            color: #555;
            margin-top: 5px;
            font-weight: bold;
        }
    </style>
    <script>
        let currentInput = 'first_number'; // Set awalnya untuk input ke angka pertama

        function insertNumber(value) {
            const input = document.getElementById(currentInput);
            input.value = input.value + value;
        }

        function clearInput() {
            document.getElementById('first_number').value = '';
            document.getElementById('second_number').value = '';
        }

        function deleteLastDigit() {
            const input = document.getElementById(currentInput);
            const start = input.selectionStart;
            const end = input.selectionEnd;

            if (start === end) {
                input.value = input.value.slice(0, -1);
            } else {
                input.setRangeText('', start, end, 'end');
            }
        }

        function selectInput(inputId) {
            currentInput = inputId;
        }

        document.addEventListener('keydown', function(event) {
            if (event.key === 'Backspace') {
                event.preventDefault();
                deleteLastDigit();
            } else if (/[0-9]/.test(event.key)) {
                // Jika tombol yang ditekan adalah angka 0-9
                event.preventDefault(); // Mencegah input default browser
                insertNumber(event.key);
            } else if (event.key === 'Enter') {
                // Submit form saat menekan Enter
                document.querySelector('form').submit();
            }
        });

        function allowOnlyNumbers(event) {
            const char = String.fromCharCode(event.which);
            if (!/[0-9]/.test(char)) {
                event.preventDefault();
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h1>{{ $operationName }}</h1>
        <h1>(@if ($operation == 'addition')
                Addition
            @elseif ($operation == 'subtraction')
                Subtraction
            @elseif ($operation == 'multiplication')
                Multiplication
            @elseif ($operation == 'division')
                Division
            @else
                Operation in English
            @endif)</h1>
        <form method="POST" action="{{ route('calculate') }}">
            @csrf
            <input type="hidden" name="operation" value="{{ $operation }}">

            <!-- Input angka pertama bilingual -->
            <div class="input-group">
                <input type="text" id="first_number" name="first_number" class="number-input"
                    placeholder="Angka pertama (First number)" onkeypress="allowOnlyNumbers(event)"
                    onclick="selectInput('first_number')">
            </div>

            <!-- Input angka kedua bilingual -->
            <div class="input-group">
                <input type="text" id="second_number" name="second_number" class="number-input"
                    placeholder="Angka kedua (Second number)" onkeypress="allowOnlyNumbers(event)"
                    onclick="selectInput('second_number')">
            </div>

            <!-- Grid tombol angka -->
            <div class="button-grid">
                <button type="button" onclick="insertNumber('1')">1 <span class="button-label">Satu</span><span
                        class="button-label">One</span></button>
                <button type="button" onclick="insertNumber('2')">2 <span class="button-label">Dua</span><span
                        class="button-label">Two</span></button>
                <button type="button" onclick="insertNumber('3')">3 <span class="button-label">Tiga</span><span
                        class="button-label">Three</span></button>
                <button type="button" onclick="insertNumber('4')">4 <span class="button-label">Empat</span><span
                        class="button-label">Four</span></button>
                <button type="button" onclick="insertNumber('5')">5 <span class="button-label">Lima</span><span
                        class="button-label">Five</span></button>
                <button type="button" onclick="insertNumber('6')">6 <span class="button-label">Enam</span><span
                        class="button-label">Six</span></button>
                <button type="button" onclick="insertNumber('7')">7 <span class="button-label">Tujuh</span><span
                        class="button-label">Seven</span></button>
                <button type="button" onclick="insertNumber('8')">8 <span class="button-label">Delapan</span><span
                        class="button-label">Eight</span></button>
                <button type="button" onclick="insertNumber('9')">9 <span class="button-label">Sembilan</span><span
                        class="button-label">Nine</span></button>

                <button type="button" class="btn btn-warning" onclick="deleteLastDigit()">Del</button>

                <button type="button" onclick="insertNumber('0')">0 <span class="button-label">Nol</span><span
                        class="button-label">Zero</span></button>

                <button type="submit" class="btn btn-success">Enter</button>
            </div>

            <br>
            <button type="button" class="clear-button" onclick="clearInput()">Clear</button>
        </form>
    </div>
</body>

</html>

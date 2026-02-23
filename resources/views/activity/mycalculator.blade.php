<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Calculator</title>
    @vite(['resources/css/app.css','resources/js/app.css'])
</head>
<body class="mx-auto text-center">
    <h1 class="font-bold">Addition Calculator</h1>
    <div class="flex justify-center">
        <form action="{{ route('showCalculate') }}" method="POST">
            @csrf
        <input type="number" name="inputNum1" id="no1" autofocus><br>  
            @if ($errors->has('inputNum1'))
            <span class="text-danger">{{$errors->first('inputNum1')}}</span>
            @endif<br>     
        <input type="number" name="inputNum2" id="no2" class="mt-2"><br>
            @if ($errors->has('inputNum2'))
            <span class="text-danger">{{$errors->first('inputNum2')}}</span>
            @endif
        <button type="submit" class="w-full text-white bg-blue-500 hover:bg-blue-800">
            Calculate Sum
        </button>
        </form>
    </div>
    @if($result !=null)
        <span class="text-center font-bold uppercase">Sum: {{$result}}</span>
    @else
        <span class="text-center font-bold uppercase">Sum: Not yet Calculated</span>
        @endif
</body>
</html>
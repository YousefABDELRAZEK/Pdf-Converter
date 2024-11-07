<!DOCTYPE html>
<html>
<head>
    <title>Image to PDF Converter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f5f5f5;
        }

        /* Header styles */
        header {
            background-color: #3b82f6;
            color: #fff;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 32px;
            font-weight: 700;
        }

        /* Main content styles */
        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }

        .container h2 {
            margin-top: 0;
            font-size: 24px;
            font-weight: 600;
            color: #3b82f6;
        }

        .container form {
            margin-top: 30px;
        }

        .container input[type="file"] {
            display: block;
            width: 100%;
            padding: 12px;
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            font-size: 16px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        .container input[type="file"]:focus {
            outline: none;
            border-color: #3b82f6;
        }

        .container button {
            background-color: #3b82f6;
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 12px 24px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .container button:hover {
            background-color: #2563eb;
        }

        /* Page styles */
        .page {
            position: relative;
            width: 100%;
            height: 100%;
            page-break-after: auto;
        }

        .page img {
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 20px;
            transform: translate(-50%, -50%);
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>
    @if(request()->isMethod('get'))
        <header>
            <h1>Image to PDF Converter</h1>
        </header>
        <main>
            <div class="container">
                <h2>Upload Images</h2>
                <form action="{{ route('pdfconverter.handle') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="images[]" multiple>
                    <button type="submit">Convert to PDF</button>
                </form>
            </div>
        </main>
    @endif
    @if(isset($images) && request()->isMethod('post'))
        @foreach($images as $image)
            <div class="page">
                <img src="file://{{ $image }}" alt="Image">
            </div>
        @endforeach
    @endif
</body>
</html>

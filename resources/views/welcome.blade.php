<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .welcome-card {
            background: white;
            padding: 60px;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 600px;
        }
        .welcome-card h1 {
            color: #667eea;
            font-size: 3rem;
            margin-bottom: 20px;
        }
        .welcome-card p {
            color: #666;
            font-size: 1.2rem;
            margin-bottom: 40px;
        }
        .btn-custom {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            margin: 10px;
            transition: all 0.3s;
        }
        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .icon {
            font-size: 5rem;
            color: #667eea;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="welcome-card">
        <div class="icon">📚</div>
        <h1>Book Management System</h1>
        <p>Manage your library efficiently with our comprehensive book management solution</p>
        
     
            <a href="{{ route('books.index') }}" class="btn btn-primary btn-custom">
                Go to Dashboard
            </a>
        
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>No they haven't</title>
    <style>
        body {
            background-color: black;
            color: white;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            overflow-x: hidden;
        }
        h1 {
            font-size: clamp(5rem, 20vw, 20rem);
            margin-top: 10vh;
            text-align: center;
            padding: 0 1rem;
            word-break: break-word;
        }
        footer {
            width: 100%;
            text-align: center;
            padding: 1rem 0;
            font-size: 0.8rem;
            color: #666;
            margin-top: auto;
        }
        a {
            color: #888;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: white;
        }
        
        @media (max-width: 768px) {
            h1 {
                margin-top: 5vh;
            }
        }
        
        @media (max-width: 480px) {
            footer {
                font-size: 0.7rem;
                padding: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
    <h1>NOPE.</h1>
    <footer>
        Made with ❤️ and 🐈 by Plexi09
        Try the <a href="api.php">API</a>!
    </footer>
</body>
</html>
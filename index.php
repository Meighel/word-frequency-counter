<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Frequency Counter</title>
    <style>
        * {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        }
        body {
            background-color: #0000FF;
            color: #f0f0f0;
            margin: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        h1 {
            color: #ffcc00;
            margin-bottom: 20px;
        }

        #wordForm {
            background-color: #2b2b2b;
            border: 2px solid #ffcc00;
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #444;
            color: #f0f0f0;
            font-size: 16px;
            margin-top: 10px;
            resize: none;
            transition: border-color 0.3s;
        }

        textarea:focus {
            border: 5px dotted #ffcc00;
            outline: none;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #444;
            color: #f0f0f0;
            margin-top: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        select:focus,
        input[type="number"]:focus {
            border-color: #ffcc00;
            outline: none;
        }

        input[type="submit"] {
            background-color: #ffcc00;
            color: #1a1a1a;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #e6b800;
            transform: scale(1.05);
        }

        .results {
            margin: 20px;
            padding: 15px 20px;
            background-color: #2b2b2b;
            border: 1px solid #ffcc00;
            border-radius: 10px;
            width: 100%;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .results h2 {
            color: #ffcc00;
            margin-left: 20px;
        }

        .results li {
            margin: 5px;
            color: #f0f0f0;
            margin-left: 20px;
        }
    </style>
</head>
<body>
    <h1>Word Frequency Counter</h1>
    
    <form id="wordForm">
        <label for="text">Paste your text here:</label>
        <textarea id="text" name="text" required placeholder=" "></textarea>
        
        <label for="sort">Sort by frequency:</label>
        <select id="sort" name="sort">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
        
        <label for="limit">Number of words to display:</label>
        <input type="number" id="limit" name="limit" value="10" min="1">
        
        <input type="submit" id="button" value="Calculate Word Frequency">
    </form>

    <div id="resultsContainer" class="results" style="display:none;">
        <h2>Results:</h2>
        <ol id="resultsList"></ol>
    </div>

    <script>
        document.getElementById('wordForm').addEventListener('submit', function(e) {
            e.preventDefault();  // Prevent the form from submitting the usual way

            // Collect form data
            const formData = new FormData(this);

            // Send the data using AJAX
            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())  // Expect a JSON response
            .then(data => {
                // Clear previous results
                const resultsList = document.getElementById('resultsList');
                resultsList.innerHTML = '';

                // Populate the results with new data
                data.forEach(result => {
                    const li = document.createElement('li');
                    li.textContent = result;
                    resultsList.appendChild(li);
                });

                // Show the results container
                document.getElementById('resultsContainer').style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>

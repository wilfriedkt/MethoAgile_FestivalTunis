<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planification des Films Retenus</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f4f8;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 900px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: auto;
        }
        h1 {
            color: #2c3e50;
            font-size: 28px;
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            color: #34495e;
            font-size: 22px;
            margin-bottom: 15px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2980b9;
            color: #fff;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        input[type="date"], input[type="time"] {
            padding: 8px;
            font-size: 14px;
            width: 100%;
            margin-top: 10px;
        }
        button {
            padding: 8px 14px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2980b9;
        }
        .planification-form {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        .planification-form input {
            flex-grow: 1;
        }
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            table, th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Planification des Films Retenus</h1>
    
    <h2>Liste des Films Validés</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Date de Projection</th>
            <th>Heure de Projection</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td><img src="images/exemple_film1.jpg" alt="Titre du film" style="width: 100px; border-radius: 8px;"></td>
            <td>Titre du Film 1</td>
            <td>Description du Film 1</td>
            <td>Non planifié</td>
            <td>Non planifié</td>
            <td>
                <form method="POST" class="planification-form">
                    <input type="hidden" name="film_id" value="1">
                    <input type="date" name="date_projection" required>
                    <input type="time" name="heure_projection" required>
                    <button type="submit">Planifier</button>
                </form>
            </td>
        </tr>
        <tr>
            <td><img src="images/exemple_film2.jpg" alt="Titre du film" style="width: 100px; border-radius: 8px;"></td>
            <td>Titre du Film 2</td>
            <td>Description du Film 2</td>
            <td>Non planifié</td>
            <td>Non planifié</td>
            <td>
                <form method="POST" class="planification-form">
                    <input type="hidden" name="film_id" value="2">
                    <input type="date" name="date_projection" required>
                    <input type="time" name="heure_projection" required>
                    <button type="submit">Planifier</button>
                </form>
            </td>
        </tr>
        <!-- Ajouter d'autres films ici -->
    </table>
</div>

</body>
</html>

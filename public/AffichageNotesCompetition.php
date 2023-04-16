<!DOCTYPE html>
<html>
<head>
	<title>Tableau de notes par obstacles</title>
	<style>
		table {
			border-collapse: collapse;
			width: 75%;
		}

		th, td {
			text-align: center;
			padding: 8px;
			border: 1px solid #ddd;
		}

		th {
			background-color: #f2f2f2;
		}

		.total {
			font-weight: bold;
            order: inherit;
		}

        .notes_obstacle {
            margin-bottom: 0%;
        }
	</style>
</head>
<body>
	<h1>Tableau de notes de la competition</h1>

    <?php
    include('../src/Controller/NotesCompetitionController.php');
    ?>
	<br>
	<input type="button" onclick="location.href='/public/AffichageNotesObstacles.php';" value="Afficher le détail des notes" />
</body>
</html>

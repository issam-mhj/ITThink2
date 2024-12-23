<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ITTHINK2</title>
    <meta name="robots" content="index, follow">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
     
      .gradient-bg {
        background: linear-gradient(to bottom right,rgb(106, 32, 158),rgb(65, 192, 154));
        min-height: 100vh;
      }

      .sidebar {
        min-height: 100vh;
        width: 16rem;
        background: #242424;
      }

      @media (max-width: 768px) {
        .sidebar {
          position: fixed;
          transform: translateX(-100%);
          z-index: 50;
          transition: transform 0.3s ease-in-out;
        }

        .sidebar.open {
          transform: translateX(0);
        }
      }
    </style>
  </head>
  <body class="gradient-bg flex flex-col md:flex-row">
    <button
      id="menuToggle"
      class="md:hidden fixed top-4 left-4 z-50 bg-gray-800 text-white p-2 rounded-lg"
    >
      ☰
    </button>

    <aside class="sidebar text-white flex flex-col p-6" id="sidebar">
      <h2 class="text-2xl font-bold mb-8">Administrateur</h2>
      <button
        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 mb-4"
        id="gestionQuestion"
      >
        Users management
      </button>
      <button
        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-green-600 mb-4"
      >
        Projets
      </button>
      <button
        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-yellow-600 mb-4"
      >
        catégories
    </button>
      <button
        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-yellow-600 mb-4"
      >
      Temoignages
    </button>
      <button
        class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-yellow-600 mb-4"
      >
      Offres
    </button>
    </aside>
    <!-- Main Content Section -->
    <section id="mainContent" class="flex-grow p-4 md:p-10 w-full">
      <div id="manageQuestions" class="hidden w-full max-w-3xl mx-auto p-4 md:p-10 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6">🛠 Gestion des Questions de Quiz</h2>
        <button onclick="displayAddQuestionForm()" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600 mb-4">Ajouter Question</button>


        <!-- Form for Adding New Question -->
        <div id="addQuestionForm" class="hidden mb-8 p-6 bg-gray-100 rounded-lg shadow-md">
          <h3 class="text-xl font-bold mb-4">Ajouter une Nouvelle Question</h3>
          <input type="text" id="newQuestionText" placeholder="Texte de la question" class="w-full px-4 py-2 border rounded-lg mb-4">
          <select id="newQuestionLevel" class="w-full px-4 py-2 border rounded-lg mb-4">
            <option value="A1">Niveau A1</option>
            <option value="A2">Niveau A2</option>
            <option value="B1">Niveau B1</option>
            <option value="B2">Niveau B2</option>
            <option value="C1">Niveau C1</option>
            <option value="C2">Niveau C2</option>
          </select>
          <select id="newQuestionCategory" class="w-full px-4 py-2 border rounded-lg mb-4">
            <option value="Grammaire">📘 Grammaire</option>
            <option value="Vocabulaire">📚 Vocabulaire</option>
            <option value="Compréhension">🔍 Compréhension</option>
          </select>
          <div id="newQuestionAnswers" class="mb-4">
            <input type="text" placeholder="Réponse 1" class="w-full px-4 py-2 border rounded-lg mb-2">
            <input type="text" placeholder="Réponse 2" class="w-full px-4 py-2 border rounded-lg mb-2">
            <input type="text" placeholder="Réponse 3" class="w-full px-4 py-2 border rounded-lg mb-2">
            <input type="text" placeholder="Réponse 4" class="w-full px-4 py-2 border rounded-lg mb-2">
          </div>
          <input type="text" id="correctAnswer" placeholder="Réponse correcte" class="w-full px-4 py-2 border rounded-lg mb-4">
          <button onclick="saveQuestion()" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600">Enregistrer Question</button>
        </div>
        <div id="questionsList" class="mt-4 overflow-x-auto">
          <h3 class="text-xl font-bold mb-4">Questions Existantes</h3>
          <!-- Dynamically generated questions will go here -->
        </div>
      </div>
      <!-- User Scores Section -->
      <div id="userScores" class="hidden w-full max-w-3xl mx-auto p-4 md:p-10 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6">📊 Tableau des Scores des Utilisateurs</h2>
        <input type="text" id="searchUser" placeholder="Rechercher un utilisateur" class="w-full px-4 py-2 border rounded-lg mb-4">
        <button onclick="searchUser()" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600 mb-4">Rechercher</button>
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse" id="scoreTable">
            <thead>
            <tr class="bg-gray-200">
              <th class="p-2 border">Nom Utilisateur</th>
              <th
                class="p-2 border cursor-pointer hover:bg-gray-300"
                onclick="searchByLVL()"
              >
                Niveau
              </th>
              <th class="p-2 border">Score</th>
              <th class="p-2 border">Date de Test</th>
            </tr>
          </thead>
          <tbody id="userScoresList"></tbody>
        </table>
      </div>
      </div>

      <!-- General Stats Section -->
      <div id="generalStats" class="hidden w-full max-w-3xl mx-auto p-4 md:p-10 bg-white rounded-2xl shadow-lg">
        <h2 class="text-2xl font-bold mb-6">📈 Statistiques Générales</h2>
        <div class="bg-gray-100 p-4 rounded-lg mb-4">
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite A1 :
          <strong id="successRate1"><span>0</span>%</strong>
        </p>
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite A2 :
          <strong id="successRate2"><span>0</span>%</strong>
        </p>
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite B1 :
          <strong id="successRate3"><span>0</span>%</strong>
        </p>
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite B2 :
          <strong id="successRate4"><span>0</span>%</strong>
        </p>
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite C1 :
          <strong id="successRate5"><span>0</span>%</strong>
        </p>
        <p id="globalSuccessRate" class="text-gray-700">
          Taux de Réussite C2 :
          <strong id="successRate6"><span>0</span>%</strong>
        </p>
        <hr class="my-[10px] w-full" />
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau A1:
          <strong id="successRate1"
            ><span id="attemptsByLevel1">0</span></strong
          >
        </p>
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau A2:
          <strong id="successRate2"
            ><span id="attemptsByLevel2">0</span></strong
          >
        </p>
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau B1:
          <strong id="successRate3"
            ><span id="attemptsByLevel3">0</span></strong
          >
        </p>
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau B2:
          <strong id="successRate4"
            ><span id="attemptsByLevel3">0</span></strong
          >
        </p>
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau C1:
          <strong id="successRate5"
            ><span id="attemptsByLevel3">0</span></strong
          >
        </p>
        <p id="attemptsPerLevel" class="text-gray-700 mt-4">
          Tentatives Niveau C2:
          <strong id="successRate6"
            ><span id="attemptsByLevel3">0</span></strong
          >
        </p>
      </div>

</div>
<div
        id="generateReports"
        class="hidden w-full max-w-3xl mx-auto p-10 bg-white rounded-2xl shadow-lg"
      >
        <h2 class="text-2xl font-bold mb-6">📄 Génération de Rapports PDF</h2>
        <input
          type="text"
          id="pdfUsername"
          placeholder="Nom d'utilisateur"
          class="w-full px-4 py-2 border rounded-lg mb-4"
        />
        <button
          onclick="generatePDFReport()"
          class="bg-red-500 text-white py-2 px-6 rounded-lg hover:bg-red-600"
          id="pdf"
        >
          Générer Rapport
        </button>
      </div>
    </section>
  </body>
</html>
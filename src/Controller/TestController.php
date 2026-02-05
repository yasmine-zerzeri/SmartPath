<?php
// TEST SIMPLE - Si ce fichier fonctionne, Symfony marche
// Accès : http://localhost:8000/test-simple

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController
{
    #[Route('/test-simple', name: 'test_simple')]
    public function test(): Response
    {
        return new Response('
            <!DOCTYPE html>
            <html>
            <head>
                <title>Test Symfony</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        max-width: 800px;
                        margin: 50px auto;
                        padding: 20px;
                        background: #f0f0f0;
                    }
                    .success {
                        background: #4CAF50;
                        color: white;
                        padding: 20px;
                        border-radius: 10px;
                        margin: 20px 0;
                    }
                    .info {
                        background: #2196F3;
                        color: white;
                        padding: 15px;
                        border-radius: 5px;
                        margin: 10px 0;
                    }
                    ul {
                        background: white;
                        padding: 20px;
                        border-radius: 5px;
                    }
                </style>
            </head>
            <body>
                <div class="success">
                    <h1>✅ SYMFONY FONCTIONNE !</h1>
                    <p>Si vous voyez cette page, votre installation Symfony est opérationnelle.</p>
                </div>
                
                <div class="info">
                    <h2>📋 Informations système</h2>
                    <ul>
                        <li>PHP Version: ' . PHP_VERSION . '</li>
                        <li>Date du test: ' . date('Y-m-d H:i:s') . '</li>
                        <li>Contrôleur: TestController</li>
                        <li>Route: /test-simple</li>
                    </ul>
                </div>
                
                <div class="info">
                    <h2>🔗 Liens vers les pages publiques</h2>
                    <ul>
                        <li><a href="/">🏠 Page d\'accueil</a></li>
                        <li><a href="/courses">📚 Catalogue de cours</a></li>
                        <li><a href="/about">ℹ️ À propos</a></li>
                        <li><a href="/contact">📧 Contact</a></li>
                    </ul>
                </div>
                
                <div class="info">
                    <h2>🛠️ Si les liens ci-dessus ne fonctionnent pas</h2>
                    <ol>
                        <li>Vérifiez que PublicController.php existe dans src/Controller/</li>
                        <li>Nettoyez le cache: <code>php bin/console cache:clear</code></li>
                        <li>Vérifiez les routes: <code>php bin/console debug:router</code></li>
                        <li>Lisez TROUBLESHOOTING.md pour plus d\'aide</li>
                    </ol>
                </div>
            </body>
            </html>
        ');
    }
}

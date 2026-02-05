# SmartPath - Templates Front-End Publics

## 📁 Structure des Templates

Les templates publics ont été créés dans le dossier `templates/public/` avec la structure suivante :

```
templates/
└── public/
    ├── base.html.twig       # Template de base (navbar, footer, theme toggle)
    ├── home.html.twig       # Page d'accueil
    ├── courses.html.twig    # Page catalogue de cours
    ├── about.html.twig      # Page à propos
    └── contact.html.twig    # Page contact
```

## 🎨 Design Features

### Thème Spatial Interactif
- **Dark Mode** (par défaut) : Fond spatial avec étoiles scintillantes, planètes flottantes, nébuleuses
- **Light Mode** : Version claire avec le même design élégant
- **Theme Toggle** : Bouton pour basculer entre dark/light mode avec sauvegarde dans localStorage

### Éléments Visuels
- ✨ Étoiles animées avec effet de scintillement
- 🪐 Planètes flottantes en arrière-plan
- 🌌 Nébuleuses avec effet de pulsation
- 🎭 Animations smooth sur tous les éléments interactifs
- 📱 Design 100% responsive

## 🚀 Pages Créées

### 1. Page d'Accueil (`home.html.twig`)
- **Hero Section** : Titre accrocheur avec image illustrative
- **Features Section** : 6 cartes présentant les fonctionnalités clés
- **Stats Banner** : Statistiques impressionnantes (50K+ apprenants, etc.)
- **CTA Section** : Appel à l'action pour commencer
- **Footer** : Liens rapides, ressources, informations légales

### 2. Page Cours (`courses.html.twig`)
- **Page Header** : Titre et description de la page
- **Course Grid** : 9 cartes de cours avec :
  - Image de couverture
  - Badge (Populaire, Nouveau, Recommandé, etc.)
  - Icône animée
  - Titre et description
  - Niveau et durée
  - Bouton "Commencer le Cours"
- **Hover Effects** : Animation de survol élégante

### 3. Page À Propos (`about.html.twig`)
- **Hero Section** : Introduction
- **Mission & Vision** : Sections décrivant les objectifs
- **Values Grid** : 6 cartes présentant les valeurs :
  - Innovation
  - Accessibilité
  - Excellence
  - Passion
  - Communauté
  - Impact

### 4. Page Contact (`contact.html.twig`)
- **Hero Section** : Titre et introduction
- **Contact Form** : Formulaire avec :
  - Nom complet
  - Email
  - Sujet
  - Message
  - Bouton d'envoi animé
- **Contact Info** : 4 cartes avec :
  - Adresse
  - Email
  - Téléphone
  - Réseaux sociaux

## 🔧 Configuration Symfony

Pour utiliser ces templates, vous devez créer les routes correspondantes dans votre contrôleur Symfony :

```php
// src/Controller/PublicController.php
<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'public_home')]
    public function home(): Response
    {
        return $this->render('public/home.html.twig');
    }

    #[Route('/courses', name: 'public_courses')]
    public function courses(): Response
    {
        return $this->render('public/courses.html.twig');
    }

    #[Route('/about', name: 'public_about')]
    public function about(): Response
    {
        return $this->render('public/about.html.twig');
    }

    #[Route('/contact', name: 'public_contact')]
    public function contact(): Response
    {
        return $this->render('public/contact.html.twig');
    }
}
```

## 📸 Assets Requis

Assurez-vous d'avoir un fichier logo dans :
```
public/images/logo.png
```

## 🎯 Fonctionnalités Clés

### Navigation
- Menu de navigation avec liens vers toutes les pages
- Menu mobile responsive avec toggle
- Indicateur de page active

### Thème
- Toggle dark/light mode avec icône (🌙/☀️)
- Sauvegarde de la préférence dans localStorage
- Transition smooth entre les thèmes

### Animations
- Fade in sur le chargement des sections
- Float animation sur les icônes
- Hover effects sur les cartes
- Pulse animation sur les boutons CTA

### Responsive Design
- Grid adaptatif pour tous les écrans
- Menu mobile pour tablettes et smartphones
- Images et textes optimisés

## 🔄 Personnalisation

### Modifier les Couleurs
Les couleurs principales sont définies dans les gradients :
- **Primary** : `#60a5fa` → `#93c5fd` (bleu)
- **CTA** : `#dc2626` → `#ef4444` (rouge)

### Modifier les Images
Remplacez les URLs Unsplash par vos propres images :
```twig
<img src="https://images.unsplash.com/..." alt="...">
```

### Ajouter du Contenu
Éditez directement les fichiers `.twig` pour modifier :
- Les textes
- Les descriptions
- Les statistiques
- Les informations de contact

## 📝 Notes Importantes

1. **Pas d'authentification** : Ces templates sont publics et accessibles sans connexion
2. **Navigation libre** : L'utilisateur peut naviguer entre toutes les pages
3. **Design cohérent** : Toutes les pages utilisent le même thème et style
4. **SEO-friendly** : Structure HTML sémantique et optimisée

## 🚦 Prochaines Étapes

1. Créer le contrôleur `PublicController.php`
2. Ajouter votre logo dans `public/images/logo.png`
3. Personnaliser les textes et images selon vos besoins
4. Optionnel : Implémenter le formulaire de contact avec traitement backend

## 💡 Tips

- Les images utilisent Unsplash (URLs directes) - remplacez-les par vos propres assets
- Le theme toggle fonctionne avec localStorage pour persister le choix
- Tous les liens sont configurés avec Symfony routing (`path()`)
- Le design est 100% CSS sans framework externe (sauf Google Fonts)

---

**Bon développement! 🚀**

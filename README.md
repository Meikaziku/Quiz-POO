# 🧠 Site de Quiz Multi-Thèmes (Projet de formation)

Ce **site de quiz interactif** permet aux utilisateurs de répondre à des **questionnaires à choix multiples** répartis sur plusieurs thèmes.  
Chaque question propose **4 réponses possibles**, avec un calcul du **score personnel** à la fin du quiz ainsi qu’un **score global cumulatif**.

Ce projet a été réalisé dans le cadre de ma formation afin de renforcer mes compétences en **logique applicative**, **gestion d’état utilisateur** et **interactivité web**.

---

## 🎯 Objectifs du projet

- Créer un système de quiz dynamique
- Gérer des questions à choix multiples
- Calculer et afficher des scores
- Améliorer l’expérience utilisateur
- Consolider mes bases en **POO** 

---

## 🧩 Fonctionnalités principales

### 📚 Quiz multi-thèmes
- Plusieurs catégories de quiz
- Questions variées selon le thème choisi

---

### ❓ Questions à choix multiples
- **4 réponses possibles par question**
- Sélection unique
- Validation de la réponse
- Feedback visuel immédiat

---

### 🧮 Système de score
- **Score personnel** affiché à la fin du quiz
- **Score global des joueurs sur ce quiz**

---

### 🏁 Fin de quiz
- Écran récapitulatif
- Score final
- Possibilité de rejouer ou de changer de thème

---

## 🎨 Interface utilisateur

- Interface claire et accessible
- Mise en page responsive
- Design orienté simplicité et lisibilité
- Navigation intuitive

---

## 🚀 Installation du projet Legend Fighter

Suivez ces étapes pour lancer le projet en local :

### 1️⃣ Cloner le projet
dans le temrinal : 
```bash
git clone https://github.com/Meikaziku/Quiz-POO.git ./
```

### 2️⃣ Installer Tailwind CSS
dans le temrinal : 
```bash
npm install tailwindcss @tailwindcss/cli
```

### 3️⃣ Compiler Tailwind en CSS prêt à l’emploi
dans le temrinal : 
```bash
npx tailwindcss -i ./public/assets/styles/style.css -o ./public/assets/styles/output.css --watch
```

### 4️⃣ Importer la base de données
Ouvrer le dossier du projet, récupérer le fichier **quiz_poo.sql** dans le dossier **bdd** à la racine. 
Creer ensuite une base de données et importer ce fichier.

### 5️⃣ Modifier le fichier /utils/db-connect.php :
```bash
$user = 'user';
$password = 'password';
$dsn = 'mysql:host=localhost;dbname=quiz_poo';
```
Dans le dbname du dsn, entrer le nom de votre base de donnée creer auparavant

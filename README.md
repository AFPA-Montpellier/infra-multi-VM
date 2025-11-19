# TP Vagrant - Infrastructure Multi-VM Web + DB

## Description
Configuration d'une infrastructure à deux machines virtuelles : un serveur web et un serveur de base de données communicant via réseau privé.

## Architecture

## Spécifications Techniques

### VM1 - Serveur Base de Données (db)
- **Nom** : db-server
- **IP** : 192.168.56.11
- **RAM** : 1024 Mo
- **CPU** : 1
- **Services** : MariaDB
- **Configuration** : Écoute sur toutes les interfaces (0.0.0.0:3306)

### VM2 - Serveur Web (web)
- **Nom** : web-server  
- **IP** : 192.168.56.10
- **RAM** : 1024 Mo
- **CPU** : 1
- **Port Forwarding** : 8080 (host) → 80 (VM)
- **Dossier partagé** : ./shared → /var/www/html
- **Services** : Apache2 + PHP + php-mysql

## Base de Données
- **Nom** : tp_db
- **Utilisateur** : tp_user
- **Mot de passe** : tp_password
- **Privilèges** : Tous droits sur tp_db

## Utilisation

### Démarrer toute l'infrastructure
```bash
vagrant up

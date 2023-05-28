## utils

Exporter la structure SQL d'une bdd postgres dans un conteneur docker

```
docker exec <nom_conteneur> pg_dump -U <nom_utilisateur> -s <nom_base_de_données> > structure.sql
```
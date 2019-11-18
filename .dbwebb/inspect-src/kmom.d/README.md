Readme
============================

Written for running database server within docker.



To update the sqldump for s specific kmom
----------------------------

Fixa upp databasen enligt rätt kmom.

```text
# Roten av kursrepot
bash .solution/sql.d/load.bash kmom01
```

Uppdatera alla skript som laddar upp databasen

```text
bash .solution/sql.d/update.bash
```

Ta en mysqldump som går att ladda vid behov.

```text
target=".dbwebb/script/inspect/kmom.d/kmom02"
for database in dbwebb skolan; do \
    echo $target/$database; \
    docker-compose run mysql-client mysqldump -uroot -ppassword -hmysql --databases $database 2>&1 | grep -v '\[Warning\] Using a password' > "$target/dump_$database.sql"; \
done
```

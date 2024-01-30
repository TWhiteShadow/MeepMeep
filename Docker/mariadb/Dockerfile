FROM mariadb:10.6

COPY /Docker/mariadb/MeepMeep.sql /docker-entrypoint-initdb.d/MeepMeep.sql
RUN chmod 644 /docker-entrypoint-initdb.d/MeepMeep.sql

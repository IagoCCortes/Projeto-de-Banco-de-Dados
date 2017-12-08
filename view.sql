create view maisVelhos as
select codDoc, sexo, idade
from docente
order by idade desc;
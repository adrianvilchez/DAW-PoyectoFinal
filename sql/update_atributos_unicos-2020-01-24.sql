ALTER TABLE usuarios
ADD UNIQUE (nombre);

ALTER TABLE grupos
ADD UNIQUE (nombreGrupo);

ALTER TABLE instrumentos
ADD UNIQUE (nombreInstrumento);
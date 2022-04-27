INSERT INTO `{$wpdb->prefix}incluyeme_cities` ( `cities_name`, `cities_location`)
VALUES ('Escazú', 'San José'),
       ('Desamparados', 'San José'),
       ('Puriscal', 'San José'),
       ('Tarrazú', 'San José'),
       ('Aserrí', 'San José'),
       ('Mora', 'San José'),
       ('Goicoechea', 'San José'),
       ('Santa Ana', 'San José'),
       ('Alajuelita', 'San José'),
       ('Vázquez de Coronado', 'San José'),
       ('Acosta', 'San José'),
       ('Tibás', 'San José'),
       ('Moravia', 'San José'),
       ('Montes de Oca', 'San José'),
       ('Turrubares', 'San José'),
       ('Dota', 'San José'),
       ('Curridabat', 'San José'),
       ('Pérez Zeledón', 'San José'),
       ('León Cortés Castro', 'San José'),
       ('Alajuela', 'Alajuela'),
       ('San Ramón', 'Alajuela'),
       ('Grecia', 'Alajuela'),
       ('San Mateo', 'Alajuela'),
       ('Atenas', 'Alajuela'),
       ('Naranjo', 'Alajuela'),
       ('Palmares', 'Alajuela'),
       ('Poás', 'Alajuela'),
       ('Orotina', 'Alajuela'),
       ('San Carlos', 'Alajuela'),
       ('Zarcero', 'Alajuela'),
       ('Sarchí', 'Alajuela'),
       ('Upala', 'Alajuela'),
       ('Los Chiles', 'Alajuela'),
       ('Guatuso', 'Alajuela'),
       ('Río Cuarto', 'Alajuela'),
       ('Cartago', 'Cartago'),
       ('Paraíso', 'Cartago'),
       ('La Unión', 'Cartago'),
       ('Jiménez', 'Cartago'),
       ('Turrialba', 'Cartago'),
       ('Alvarado', 'Cartago'),
       ('Oreamuno', 'Cartago'),
       ('Heredia', 'Heredia'),
       ('Barva', 'Heredia'),
       ('Santo Domingo', 'Heredia'),
       ('Santa Bárbara', 'Heredia'),
       ('San Rafaél', 'Cartago'),
       ('San Isidro', 'Heredia'),
       ('Belén', 'Heredia'),
       ('Flores', 'Heredia'),
       ('San Pablo', 'Heredia'),
       ('Sarapiquí', 'Heredia'),
       ('Liberia', 'Liberia'),
       ('Nicoya', 'Liberia'),
       ('Santa Cruz', 'Liberia'),
       ('Bagaces', 'Liberia'),
       ('Carrillo', 'Liberia'),
       ('Cañas' , 'Liberia'),
       ('Abangáres', 'Liberia'),
       ('Tilarán', 'Liberia'),
       ('La Cruz', 'Liberia'),
       ('Hojancha', 'Liberia'),
       ('Nandayure', 'Liberia'),
       ('Puntarenas', 'Puntarenas'),
       ('Esparza', 'Puntarenas'),
       ('Buenos Aires', 'Puntarenas'),
       ('Montes de Oro', 'Puntarenas'),
       ('Osa', 'Puntarenas'),
       ('Aguirre', 'Puntarenas'),
       ('Golfito', 'Puntarenas'),
       ('Coto Brus', 'Puntarenas'),
       ('Parrita', 'Liberia'),
       ('Corredores', 'Liberia'),
       ('Garabito', 'Liberia'),
       ('Limón', 'Limón'),
       ('Pococí', 'Limón'),
       ('Siquirres', 'Limón'),
       ('Talamanca', 'Limón'),
       ('Matina', 'Limón'),
       ('Guácimo', 'Limón'); --


UPDATE `{$wpdb->prefix}incluyeme_cities`
SET cities_name = 'San José'
WHERE cities_name = 'San Jos'; --
UPDATE `{$wpdb->prefix}incluyeme_cities`
SET cities_location = 'San José'
WHERE cities_location = 'San Jos'; --
UPDATE `{$wpdb->prefix}incluyeme_provincias`
SET cities_provin ='San José'
WHERE cities_provin = 'San Jos'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Alajuela',
    country_code  = 'CR'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Cartago',
    country_code  = 'CR'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Heredia',
    country_code  = 'CR'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Liberia',
    country_code  = 'CR'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Puntarenas',
    country_code  = 'CR'; --
INSERT INTO `{$wpdb->prefix}incluyeme_provincias`
set cities_provin = 'Limón',
    country_code  = 'CR'; --




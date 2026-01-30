-- ============================================
-- Agregar provincias y ciudades de Ecuador
-- (Ecuador ya existe con ID 64)
-- ============================================

-- Insertar provincias de Ecuador
INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(5001, 'Azuay', 64),
(5002, 'Bolívar', 64),
(5003, 'Cañar', 64),
(5004, 'Carchi', 64),
(5005, 'Chimborazo', 64),
(5006, 'Cotopaxi', 64),
(5007, 'El Oro', 64),
(5008, 'Esmeraldas', 64),
(5009, 'Galápagos', 64),
(5010, 'Guayas', 64),
(5011, 'Imbabura', 64),
(5012, 'Loja', 64),
(5013, 'Los Ríos', 64),
(5014, 'Manabí', 64),
(5015, 'Morona Santiago', 64),
(5016, 'Napo', 64),
(5017, 'Orellana', 64),
(5018, 'Pastaza', 64),
(5019, 'Pichincha', 64),
(5020, 'Santa Elena', 64),
(5021, 'Santo Domingo', 64),
(5022, 'Sucumbíos', 64),
(5023, 'Tungurahua', 64),
(5024, 'Zamora Chinchipe', 64);

-- Insertar ciudades principales de Ecuador
INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
-- Azuay
(50001, 'Cuenca', 5001),
(50002, 'Gualaceo', 5001),
(50003, 'Paute', 5001),
-- Bolívar
(50004, 'Guaranda', 5002),
(50005, 'San Miguel', 5002),
-- Cañar
(50006, 'Azogues', 5003),
(50007, 'Cañar', 5003),
(50008, 'La Troncal', 5003),
-- Carchi
(50009, 'Tulcán', 5004),
(50010, 'San Gabriel', 5004),
-- Chimborazo
(50011, 'Riobamba', 5005),
(50012, 'Alausí', 5005),
(50013, 'Guano', 5005),
-- Cotopaxi
(50014, 'Latacunga', 5006),
(50015, 'La Maná', 5006),
(50016, 'Pujilí', 5006),
-- El Oro
(50017, 'Machala', 5007),
(50018, 'Pasaje', 5007),
(50019, 'Huaquillas', 5007),
(50020, 'Santa Rosa', 5007),
-- Esmeraldas
(50021, 'Esmeraldas', 5008),
(50022, 'Atacames', 5008),
(50023, 'Quinindé', 5008),
-- Galápagos
(50024, 'Puerto Baquerizo Moreno', 5009),
(50025, 'Puerto Ayora', 5009),
(50026, 'Puerto Villamil', 5009),
-- Guayas
(50027, 'Guayaquil', 5010),
(50028, 'Durán', 5010),
(50029, 'Milagro', 5010),
(50030, 'Daule', 5010),
(50031, 'Samborondón', 5010),
(50032, 'Playas', 5010),
(50033, 'Salinas', 5010),
-- Imbabura
(50034, 'Ibarra', 5011),
(50035, 'Otavalo', 5011),
(50036, 'Cotacachi', 5011),
(50037, 'Atuntaqui', 5011),
-- Loja
(50038, 'Loja', 5012),
(50039, 'Catamayo', 5012),
(50040, 'Macará', 5012),
-- Los Ríos
(50041, 'Babahoyo', 5013),
(50042, 'Quevedo', 5013),
(50043, 'Ventanas', 5013),
(50044, 'Vinces', 5013),
-- Manabí
(50045, 'Portoviejo', 5014),
(50046, 'Manta', 5014),
(50047, 'Bahía de Caráquez', 5014),
(50048, 'Chone', 5014),
(50049, 'Jipijapa', 5014),
-- Morona Santiago
(50050, 'Macas', 5015),
(50051, 'Gualaquiza', 5015),
-- Napo
(50052, 'Tena', 5016),
(50053, 'Archidona', 5016),
-- Orellana
(50054, 'Puerto Francisco de Orellana', 5017),
(50055, 'La Joya de los Sachas', 5017),
-- Pastaza
(50056, 'Puyo', 5018),
(50057, 'Shell', 5018),
-- Pichincha
(50058, 'Quito', 5019),
(50059, 'Cayambe', 5019),
(50060, 'Machachi', 5019),
(50061, 'Sangolquí', 5019),
(50062, 'Tabacundo', 5019),
-- Santa Elena
(50063, 'Santa Elena', 5020),
(50064, 'La Libertad', 5020),
(50065, 'Salinas', 5020),
-- Santo Domingo
(50066, 'Santo Domingo', 5021),
-- Sucumbíos
(50067, 'Nueva Loja', 5022),
(50068, 'Shushufindi', 5022),
-- Tungurahua
(50069, 'Ambato', 5023),
(50070, 'Baños', 5023),
(50071, 'Pelileo', 5023),
-- Zamora Chinchipe
(50072, 'Zamora', 5024),
(50073, 'Yantzaza', 5024);

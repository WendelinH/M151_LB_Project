-- Dieser SQL Code kann bei PHPMyAdmin ausgefürt werden.
INSERT INTO users(id, name, email, password, is_admin)
VALUES(
        1,
        'Gast',
        'gast@example.com',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- password
        0
    ),
    (
        2,
        'Admin',
        'admin@example.com',
        '$2y$10$m28Pc1hsiGoaauNbDlNfxuZtmkVYN.a11T2osfUtTYJ3UzrlAUS1q', -- klapp42stuhl 
        1
    );
INSERT INTO artikels(bezeichnung, id, preis, image_path)
VALUES('Etui', 1, 9.90, 'etui.jpg'),
    ('Holzschachtel', 2, 11.90, 'holzschachtel.jpg');
INSERT INTO inhalts (id, bezeichnung, preis, image_path)
VALUES(1, 'Bleistift', 0.90, 'bleistift.jpg'),
    (2, 'Schere', 3.50, 'schere.jpg'),
    (3, 'Radiergummi', 0.90, 'gummi.jpg'),
    (4, 'Spitzer', 5.00, 'spitzer.jpg'),
    (5, 'Filzstift', 1.50, 'filzstift.jpg'),
    (6, 'Zirkel', 7.90, 'zirkel.jpg'),
    (7, 'Lineal', 2.50, 'lineal.jpg'),
    (8, 'Kugelschreiber', 0.90, 'kugelschreiber.jpg');
INSERT INTO konfigurations(artikel_id, inhalt_id)
VALUES(1, 1),
    (1, 2),
    (1, 3),
    (1, 4),
    (1, 5),
    (1, 8),
    (2, 1),
    (2, 3),
    (2, 4),
    (2, 5),
    (2, 6),
    (2, 7),
    (2, 8);
-- Products
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) UNIQUE,
    description TEXT,
    image_url VARCHAR(255),
    is_active TINYINT(1) DEFAULT 1,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Packages
CREATE TABLE packages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    name VARCHAR(50), -- Starter | Builder | Premier
    price DECIMAL(10, 2) NOT NULL,
    pv INT NOT NULL, -- Personal Volume
    is_active TINYINT(1) DEFAULT 1,
    FOREIGN KEY (product_id) REFERENCES products (id) ON DELETE CASCADE,
    INDEX idx_product (product_id)
);

-- Orders
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total DECIMAL(10, 2) NOT NULL,
    status ENUM(
        'pending',
        'paid',
        'shipped',
        'delivered',
        'cancelled'
    ) DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE,
    INDEX idx_user (user_id)
);

-- Order Items
CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    package_id INT NOT NULL,
    quantity INT NOT NULL,
    price_each DECIMAL(10, 2) NOT NULL,
    pv_each INT NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders (id) ON DELETE CASCADE,
    FOREIGN KEY (package_id) REFERENCES packages (id)
);

-- Seed data
INSERT INTO
    products (
        name,
        slug,
        description,
        image_url
    )
VALUES (
        'SalveoWell Starter Kit',
        'starter-kit',
        'All-in-one wellness starter package',
        'assets/img/starter.jpg'
    );

INSERT INTO
    packages (product_id, name, price, pv)
VALUES (1, 'Starter', 59.00, 30),
    (1, 'Builder', 129.00, 70),
    (1, 'Premier', 249.00, 150);
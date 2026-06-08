CREATE DATABASE IF NOT EXISTS `quanly_sach` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `quanly_sach`;

-- 1. Bảng Thể loại sách (Categories)
CREATE TABLE IF NOT EXISTS `categories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);

-- 2. Bảng Tác giả (Authors)
CREATE TABLE IF NOT EXISTS `authors` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `bio` TEXT
);

-- 3. Bảng Sách (Books)
CREATE TABLE IF NOT EXISTS `books` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `price` DECIMAL(10, 2) NOT NULL,
    `description` TEXT,
    `image` VARCHAR(255) DEFAULT NULL,
    `category_id` INT,
    `author_id` INT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE SET NULL,
    FOREIGN KEY (`author_id`) REFERENCES `authors`(`id`) ON DELETE SET NULL
);

-- ==========================================
-- THÊM DỮ LIỆU MẪU CHO QUẢN LÝ SÁCH
-- ==========================================

INSERT INTO `categories` (`name`) VALUES 
('Văn học Việt Nam'), 
('Kinh doanh làm giàu'), 
('Kỹ năng sống'), 
('Tiểu thuyết nước ngoài');

INSERT INTO `authors` (`name`, `bio`) VALUES 
('Nam Cao', 'Nhà văn hiện thực xuất sắc của văn học Việt Nam'), 
('Robert T. Kiyosaki', 'Tác giả bộ sách nổi tiếng Cha giàu cha nghèo'), 
('Dale Carnegie', 'Chuyên gia tâm lý và kỹ năng giao tiếp nổi tiếng'),
('J.K. Rowling', 'Tác giả của bộ truyện kinh điển Harry Potter');

INSERT INTO `books` (`title`, `price`, `description`, `category_id`, `author_id`) VALUES 
('Chí Phèo', 45000, 'Tác phẩm văn học hiện thực phản ánh chân thực hình ảnh người nông dân Việt Nam trước Cách mạng tháng Tám.', 1, 1),
('Cha Giàu Cha Nghèo', 115000, 'Cuốn sách thay đổi tư duy của hàng triệu người về tiền bạc và đầu tư.', 2, 2),
('Đắc Nhân Tâm', 85000, 'Cuốn sách gối đầu giường về nghệ thuật thu phục lòng người.', 3, 3),
('Lão Hạc', 40000, 'Tuyển tập truyện ngắn nổi bật của nhà văn Nam Cao.', 1, 1),
('Harry Potter và Hòn Đá Phù Thủy', 150000, 'Chuyến phiêu lưu ma thuật bắt đầu của cậu bé phù thủy.', 4, 4);

-- ==========================================
-- BẢNG SẢN PHẨM (CH) CHO TRANG CỬA HÀNG (dssp.php)
-- ==========================================
-- Mình tạo thêm bảng này để lỡ bạn gọi giao diện dssp.php thì nó không bị lỗi

CREATE TABLE IF NOT EXISTS `CH` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `tenSP` VARCHAR(255) NOT NULL,
    `gia` DECIMAL(10, 2) NOT NULL,
    `sl` INT DEFAULT 10,
    `mo_ta` TEXT
);

INSERT INTO `CH` (`tenSP`, `gia`, `sl`, `mo_ta`) VALUES 
('Sách Chí Phèo bản đặc biệt', 65000, 5, 'Bản in kỷ niệm'),
('Sách Đắc Nhân Tâm bìa cứng', 120000, 3, 'Chất lượng giấy tốt, bìa cứng sang trọng'),
('Bộ truyện Harry Potter (7 cuốn)', 950000, 15, 'Trọn bộ truyện ma thuật'),
('Sách Cha Giàu Cha Nghèo tập 1', 95000, 8, 'Tập nền tảng nhất của bộ sách');

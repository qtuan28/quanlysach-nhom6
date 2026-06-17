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
('Tiểu thuyết nước ngoài'),
('Khoa học viễn tưởng'),
('Lịch sử'),
('Khoa học & Kỹ thuật');

INSERT INTO `authors` (`name`, `bio`) VALUES 
('Nam Cao', 'Nhà văn hiện thực xuất sắc của văn học Việt Nam'), 
('Robert T. Kiyosaki', 'Tác giả bộ sách nổi tiếng Cha giàu cha nghèo'), 
('Dale Carnegie', 'Chuyên gia tâm lý và kỹ năng giao tiếp nổi tiếng'),
('J.K. Rowling', 'Tác giả của bộ truyện kinh điển Harry Potter'),
('Nguyễn Nhật Ánh', 'Nhà văn nổi tiếng với các tác phẩm tuổi thơ'),
('Yuval Noah Harari', 'Nhà sử học, triết học người Israel'),
('Dan Brown', 'Nhà văn nổi tiếng với các tác phẩm tiểu thuyết trinh thám'),
('Vũ Trọng Phụng', 'Ông vua phóng sự đất Bắc'),
('Ngô Tất Tố', 'Nhà văn hiện thực xuất sắc'),
('Tô Hoài', 'Nhà văn nổi tiếng với Dế Mèn Phiêu Lưu Ký'),
('Nguyên Hồng', 'Nhà văn của những người cùng khổ'),
('Paulo Coelho', 'Tiểu thuyết gia người Brazil'),
('Jose Mauro de Vasconcelos', 'Nhà văn Brazil'),
('Haruki Murakami', 'Tiểu thuyết gia người Nhật Bản'),
('Umberto Eco', 'Triết gia, nhà văn Ý'),
('Gabriel Garcia Marquez', 'Nhà văn người Colombia, giải Nobel Văn học'),
('Lev Tolstoy', 'Đại văn hào Nga'),
('Fyodor Dostoevsky', 'Nhà văn Nga vĩ đại'),
('Victor Hugo', 'Đại văn hào Pháp'),
('Mario Puzo', 'Nhà văn người Mỹ gốc Ý'),
('Jack London', 'Nhà văn người Mỹ'),
('Ayn Rand', 'Nữ tiểu thuyết gia người Mỹ gốc Nga'),
('Stephen Hawking', 'Nhà vật lý lý thuyết người Anh');

INSERT INTO `books` (`title`, `price`, `description`, `category_id`, `author_id`) VALUES 
('Chí Phèo', 45000, 'Tác phẩm văn học hiện thực phản ánh chân thực hình ảnh người nông dân Việt Nam trước Cách mạng tháng Tám.', 1, 1),
('Cha Giàu Cha Nghèo', 115000, 'Cuốn sách thay đổi tư duy của hàng triệu người về tiền bạc và đầu tư.', 2, 2),
('Đắc Nhân Tâm', 85000, 'Cuốn sách gối đầu giường về nghệ thuật thu phục lòng người.', 3, 3),
('Lão Hạc', 40000, 'Tuyển tập truyện ngắn nổi bật của nhà văn Nam Cao.', 1, 1),
('Harry Potter và Hòn Đá Phù Thủy', 150000, 'Chuyến phiêu lưu ma thuật bắt đầu của cậu bé phù thủy.', 4, 4),
('Cho Tôi Xin Một Vé Đi Tuổi Thơ', 65000, 'Tác phẩm đưa người đọc trở về những kỷ niệm tuổi thơ hồn nhiên, trong sáng.', 1, 5),
('Mắt Biếc', 75000, 'Câu chuyện tình buồn nhưng đẹp của Ngạn và Hà Lan.', 1, 5),
('Sapiens: Lược Sử Loài Người', 210000, 'Cuốn sách bao quát lịch sử tiến hóa và phát triển của loài người.', 6, 6),
('Mật Mã Da Vinci', 145000, 'Tiểu thuyết trinh thám ly kỳ với những màn giải mã hấp dẫn.', 4, 7),
('Số Đỏ', 55000, 'Tác phẩm châm biếm sâu sắc xã hội Việt Nam thời kỳ trước năm 1945.', 1, 8),
('Tắt Đèn', 50000, 'Bức tranh chân thực về nỗi khổ của người nông dân dưới chế độ phong kiến nửa thuộc địa.', 1, 9),
('Harry Potter và Phòng Chứa Bí Mật', 155000, 'Năm học thứ hai đầy bí ẩn và thử thách của Harry tại Hogwarts.', 4, 4),
('Harry Potter và Tên Tù Nhân Ngục Azkaban', 160000, 'Câu chuyện về sự thật đằng sau cái chết của cha mẹ Harry Potter.', 4, 4),
('Tôi Thấy Hoa Vàng Trên Cỏ Xanh', 68000, 'Câu chuyện tuổi thơ ngọt ngào và đầy cảm xúc.', 1, 5),
('Thiên Thần Và Ác Quỷ', 140000, 'Một cuộc phiêu lưu nghẹt thở khác của Robert Langdon.', 4, 7),
('Dế Mèn Phiêu Lưu Ký', 45000, 'Tác phẩm văn học thiếu nhi kinh điển của Tô Hoài.', 1, 10),
('Bỉ Vỏ', 50000, 'Tác phẩm của nhà văn Nguyên Hồng', 1, 11),
('Giông Tố', 60000, 'Một tiểu thuyết xuất sắc khác của Vũ Trọng Phụng', 1, 8),
('Homo Deus: Lược Sử Tương Lai', 220000, 'Cuốn sách tiếp nối Sapiens của Yuval Noah Harari', 6, 6),
('21 Bài Học Cho Thế Kỷ 21', 200000, 'Những suy ngẫm về thế giới hiện tại của Yuval Noah Harari', 6, 6),
('Nguồn Cội', 160000, 'Tiểu thuyết trinh thám của Dan Brown', 4, 7),
('Hỏa Ngục', 150000, 'Cuộc phưu lưu của Robert Langdon tại Ý', 4, 7),
('Pháo Đài Số', 140000, 'Tiểu thuyết về công nghệ giải mã', 4, 7),
('Harry Potter và Chiếc Cốc Lửa', 180000, 'Cuộc thi Tam Pháp Thuật', 4, 4),
('Harry Potter và Hội Phượng Hoàng', 190000, 'Sự trở lại của Chúa tể Voldemort', 4, 4),
('Harry Potter và Hoàng Tử Lai', 190000, 'Những bí mật về quá khứ của Voldemort', 4, 4),
('Harry Potter và Bảo Bối Tử Thần', 200000, 'Phần cuối cùng của loạt truyện', 4, 4),
('Quẳng Gánh Lo Đi Và Vui Sống', 75000, 'Cuốn sách về cách kiểm soát lo âu của Dale Carnegie', 3, 3),
('Nghệ Thuật Nói Trước Công Chúng', 80000, 'Sách kỹ năng của Dale Carnegie', 3, 3),
('Dạy Con Làm Giàu Tập 2', 105000, 'Sử dụng đồng vốn', 2, 2),
('Dạy Con Làm Giàu Tập 3', 105000, 'Hướng dẫn đầu tư', 2, 2),
('Dạy Con Làm Giàu Tập 4', 105000, 'Con giàu con thông minh', 2, 2),
('Nhà Giả Kim', 65000, 'Cuốn sách bán chạy nhất của Paulo Coelho', 4, 12),
('Cây Cam Ngọt Của Tôi', 70000, 'Câu chuyện cảm động của Jose Mauro de Vasconcelos', 4, 13),
('Kafka Bên Bờ Biển', 120000, 'Tiểu thuyết của Haruki Murakami', 4, 14),
('Rừng Na Uy', 110000, 'Tiểu thuyết nổi tiếng của Haruki Murakami', 4, 14),
('Tên Của Đóa Hồng', 150000, 'Tiểu thuyết của Umberto Eco', 4, 15),
('Trăm Năm Cô Đơn', 130000, 'Tiểu thuyết của Gabriel Garcia Marquez', 4, 16),
('Chiến Tranh Và Hòa Bình', 250000, 'Kiệt tác của Lev Tolstoy', 4, 17),
('Tội Ác Và Hình Phạt', 180000, 'Tiểu thuyết của Fyodor Dostoevsky', 4, 18),
('Những Người Khốn Khổ', 220000, 'Tiểu thuyết của Victor Hugo', 4, 19),
('Bố Già', 120000, 'Tiểu thuyết của Mario Puzo', 4, 20),
('Tiếng Gọi Của Nơi Hoang Dã', 60000, 'Truyện ngắn của Jack London', 4, 21),
('Suối Nguồn', 250000, 'Tiểu thuyết của Ayn Rand', 4, 22),
('Lược Sử Thời Gian', 150000, 'Sách khoa học của Stephen Hawking', 7, 23);

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
('Sách Cha Giàu Cha Nghèo tập 1', 95000, 8, 'Tập nền tảng nhất của bộ sách'),
('Combo Nguyễn Nhật Ánh (3 cuốn)', 195000, 10, 'Bao gồm Mắt Biếc, Tôi Thấy Hoa Vàng Trên Cỏ Xanh, Cho Tôi Xin Một Vé Đi Tuổi Thơ'),
('Sapiens bìa cứng cao cấp', 250000, 5, 'Bản bìa cứng có minh họa'),
('Số Đỏ bản in lại', 60000, 20, 'Bản in chữ to, giấy xốp nhẹ'),
('Trọn bộ Dan Brown (2 cuốn)', 270000, 7, 'Mật mã Da Vinci, Thiên thần và Ác quỷ'),
('Mắt Biếc bản điện ảnh', 85000, 12, 'Bìa sách là poster phim Mắt Biếc'),
('Tắt Đèn tái bản', 55000, 15, 'Bản in mới nhất của NXB Kim Đồng');

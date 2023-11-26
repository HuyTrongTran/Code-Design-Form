-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 26, 2023 lúc 11:05 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybds_theserven`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `full_contract`
--

CREATE TABLE `full_contract` (
  `ID` int(11) NOT NULL,
  `Full_Contract_Code` varchar(12) DEFAULT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Year_Of_Birth` date DEFAULT NULL,
  `SSN` varchar(15) NOT NULL,
  `Customer_Address` varchar(100) DEFAULT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Property_ID` int(11) NOT NULL,
  `Date_Of_Contract` date DEFAULT NULL,
  `Price` decimal(18,0) DEFAULT NULL,
  `Deposit` decimal(18,0) DEFAULT NULL,
  `Remain` decimal(18,0) DEFAULT NULL,
  `Status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `full_contract`
--

INSERT INTO `full_contract` (`ID`, `Full_Contract_Code`, `Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`) VALUES
(33, '2311FC0001', '123', '2023-11-09', '111', 'asasd', '123', 0, '2023-11-14', 1, 1, 1, b'1'),
(34, '2311FC0002', '123', '2023-11-09', '111', 'asasd', '123', 0, '2023-11-14', 1, 1, 1, b'1'),
(35, '2311FC0003', 'Long', '2001-10-12', '10000', 'abc', '123456789', 0, '2023-11-26', 1000, 1000, 1000, b'1');

--
-- Bẫy `full_contract`
--
DELIMITER $$
CREATE TRIGGER `Full_Contract_THEAUTO` BEFORE INSERT ON `full_contract` FOR EACH ROW BEGIN
    SET @year_part = SUBSTRING(YEAR(NEW.Date_Of_Contract), 3, 2);
    SET @month_part = LPAD(MONTH(NEW.Date_Of_Contract), 2, '0');
    SET @new_number = LPAD(
            IFNULL(
                    (SELECT MAX(CAST(SUBSTRING(Full_Contract_Code, 7) AS UNSIGNED)) + 1 FROM full_contract
                    WHERE full_contract.Full_Contract_Code LIKE CONCAT( @year_part, @month_part,'FC', '%')),
                    1), 4, '0');
    SET NEW.Full_Contract_Code = CONCAT(@year_part, @month_part,'FC',@new_number);
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `full_contract`
--
ALTER TABLE `full_contract`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `full_contract`
--
ALTER TABLE `full_contract`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

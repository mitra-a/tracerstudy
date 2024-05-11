-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2024 at 06:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracerstudy`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`kode`, `nama`, `created_at`, `updated_at`) VALUES
('JPKK', 'Jurusan Pendidikan Kesejahteraan Keluarga', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTE', 'Jurusan Pendidikan Teknik Elektronika', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTELEKTRO', 'Jurusan Pendidikan Teknik Elektro', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTM', 'Jurusan Pendidikan Teknik Mesin', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTO', 'Jurusan Pendidikan Teknik Otomotif', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTP', 'Jurusan Pendidikan Teknologi Pertanian', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JPTSP', 'Jurusan Pendidikan Teknik Sipil dan Perencanaan', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('JTIK', 'Jurusan Teknik Informatika dan Komputer', '2024-05-11 05:49:07', '2024-05-11 05:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` char(36) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `nama`, `deskripsi`, `periode`, `created_at`, `updated_at`) VALUES
('9c04b393-6c7e-4092-b30b-5b81e0392e49', 'Kuesioner Alumni 2024', 'kuesioner wajib alumni', '[\"P2021\",\"P2020\",\"P2019\"]', '2024-05-11 07:07:45', '2024-05-11 07:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_halaman`
--

CREATE TABLE `kuesioner_halaman` (
  `id` char(36) NOT NULL,
  `kuesioner_id` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuesioner_halaman`
--

INSERT INTO `kuesioner_halaman` (`id`, `kuesioner_id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
('9c04b427-9887-4af6-ac50-3adcbb80c967', '9c04b393-6c7e-4092-b30b-5b81e0392e49', 'Data Pribadi', 'berisi data pertanyaan tentang data pribadi alumni', '2024-05-11 07:09:22', '2024-05-11 07:10:50'),
('9c04b488-8bb6-4d35-894a-e54cbc978f90', '9c04b393-6c7e-4092-b30b-5b81e0392e49', 'Kuesioner Wajib', 'kuesioner wajib diisi untuk alumni', '2024-05-11 07:10:26', '2024-05-11 07:10:26'),
('9c04b49b-7bca-4be8-b879-8ef47eb872e5', '9c04b393-6c7e-4092-b30b-5b81e0392e49', 'Pekerjaan', 'kuesioner tentang pekerjaan', '2024-05-11 07:10:38', '2024-05-11 07:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_jawaban`
--

CREATE TABLE `kuesioner_jawaban` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `kuesioner_id` varchar(255) NOT NULL,
  `alumni_id` varchar(255) NOT NULL,
  `soal_id` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `validasi` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuesioner_jawaban`
--

INSERT INTO `kuesioner_jawaban` (`id`, `type`, `kuesioner_id`, `alumni_id`, `soal_id`, `jawaban`, `validasi`, `created_at`, `updated_at`) VALUES
('9c04c094-6f62-44d2-aa8f-bd641717ff8f', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'Mitra', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7dbe-4a73-95ee-2f8c051175a1', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b73a-8a44-422f-a3ef-95dac05eaf91', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7e35-452d-9752-abe5240eb2f8', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2020', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7eb2-4b28-9d4b-66c82c914be3', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '200209501019', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7f2e-40d7-8d19-b9c669370664', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Goa Ria', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7f8c-44ab-8e9a-79f408f2f694', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2002-12-09', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-7fef-4ab1-a113-5d49b9b1c364', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b971-d787-465c-a19b-24a375a22f18', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-8075-4f29-816b-65ed3221658e', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b992-b770-45a3-a9e4-e7caabe1e6f2', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-80ff-4374-85b1-2f739ec681f8', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-8352-4830-bd9e-a17bf5d9a5ec', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-83d4-4db5-8a44-57622488082d', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-84f5-4fe9-8873-09913b30f689', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04baf0-6ea0-43ef-97c2-2b5bc55c5abe', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-857c-4de3-853e-33a98a6e9caf', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c094-86c1-43c5-bf79-1b80d9c28f34', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04bf80-ca7c-422e-9eef-d4f82db6952e', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 07:44:07', '2024-05-11 07:44:38'),
('9c04c696-58e4-4bf1-91a6-37d020a837af', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'Alfian', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5d74-480e-9545-a3fd9c410cef', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b73a-8a44-422f-a3ef-95dac05eaf91', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5e4d-47c8-a03c-2d5a3d87861a', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2020', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5eaa-4919-aac4-7ef8116229a8', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '10191819', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5f05-4747-ad4e-e8138ac31b93', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Telkomas', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5f5e-431b-9cd2-3a4a9153929e', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2024-05-23', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-5fd0-4ac2-bfb2-31cd4ad6f427', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b97b-13eb-46e7-bb85-7b451638e100', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-6025-466e-874a-0a70e5f8fbc9', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b99d-ac2d-415d-a403-96ee1b045f7c', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-607a-4854-a85a-61e416cc1b95', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-626b-464b-9d69-5f978710c6dc', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-62b0-481a-8d6c-8bcda51b501f', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-63d3-4688-bf17-c65dfccc2877', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04bae9-d976-4f50-8844-1daf4ec87ae9', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-641a-48eb-8fa6-fea673549f66', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c696-650c-47cb-8ca3-35280d53cfcd', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 08:00:55', '2024-05-11 08:00:57'),
('9c04c704-a176-41ac-8927-ef187c5b9d5c', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'Adji', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-afc8-4a71-8516-0bb355690b93', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b73a-8a44-422f-a3ef-95dac05eaf91', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b055-4cdc-82ba-198f54c31762', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2023', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b0c9-4a26-94d8-1f619e51fd84', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '198393180', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b11f-42b6-825a-be75a474459a', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Mangga Tiga', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b175-4dee-86fe-a054e80fc6dd', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2024-05-14', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b224-4f95-8b1f-b98ad9236416', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b981-62ba-4059-a241-db5695b0d33a', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b27d-4637-8aa3-258ac3631bab', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b99d-ac2d-415d-a403-96ee1b045f7c', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b2f9-44a3-a302-b6c67277c6c7', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b54b-4627-919a-636572c303ce', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b5eb-4431-af4d-238ba52dce83', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b75e-4927-905b-25e47c202cb6', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04baf0-6ea0-43ef-97c2-2b5bc55c5abe', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b7aa-486b-9016-20c249170f38', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c704-b914-40e0-9f16-8bf9fcb3fc99', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 08:02:07', '2024-05-11 08:02:10'),
('9c04c762-3558-4abc-848b-bc84f1c13e8a', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'Farid', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-36e3-47c5-a8c3-4b17884cc663', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b73a-8a44-422f-a3ef-95dac05eaf91', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3740-4d73-a658-950fe71553bc', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2021', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-379d-45ee-9fe9-5e259001988e', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '543998503485', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-37f9-48c2-9450-a4ccbbbc5656', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Takalar', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-386e-498d-b72d-a51b1f34e1fc', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2024-05-16', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-38be-42e6-8bc6-1c66414c623e', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b97b-13eb-46e7-bb85-7b451638e100', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3961-4b28-bb00-2772d5f90ee4', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b99d-ac2d-415d-a403-96ee1b045f7c', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-39d3-4aad-bd2b-e081dd7c62c7', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3bb7-4b5e-8661-692be27cad42', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3bfd-4ae0-a561-e58c24dc5f38', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3ce6-4700-a5a5-a566d178a74e', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04badf-83b6-4c94-aae3-b1f7bdc27c25', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3dad-4145-bb68-e5a50bda671b', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdbcbe7-0763-45c2-ad0e-b35510685c70', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 08:03:09', '2024-05-11 08:03:11'),
('9c04c7de-1db0-4266-a2e4-d34befd0d02c', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'Mitra', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2232-4849-93d9-eacc13543a33', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b75e-7572-4918-be16-8e7a02076e3d', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-22af-44aa-8543-5e5edd932ab4', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2021', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-22fe-4f9c-9639-7500078018e2', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '3948395457', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2350-428f-95c4-5a11fb267b09', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Permandian', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-23cf-448b-9179-7ee9832de5af', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2024-05-22', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-241f-4f54-8fa7-e0ceb54fd2bf', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b971-d787-465c-a19b-24a375a22f18', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-246b-4cca-8055-7f9d480f895e', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b9b2-8e64-407b-97a4-40fd707cb694', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2754-49a2-88db-d0882ee7ee38', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-27a2-49ca-b5bc-df914436fe6d', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2921-4cf1-a524-925197e73046', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04bae9-d976-4f50-8844-1daf4ec87ae9', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2970-458d-8d62-59604df51283', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc081e-a39c-4490-934e-fad22e6e82a9', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 08:04:30', '2024-05-11 08:04:32'),
('9c04c848-f38a-4b12-92ca-69564df65f19', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b738-53a5-46a0-b147-32c9bdf3fa8d', 'rusma', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-f858-46a9-a97a-25776fcaf813', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b75e-7572-4918-be16-8e7a02076e3d', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-f925-4c17-9cd4-5da52481724d', 'jawab-angka', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '2021', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-f979-4ea9-99d0-1f5f216dfa68', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '200209501019', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fa2a-48c1-8e0f-1982a8d22903', 'jawab-text', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', 'Jl Urip', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fa78-4ed3-a1b7-67855e2ce0e3', 'jawab-tanggal', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b7e4-660d-462d-81c0-8f65843a11a3', '2024-05-07', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fac7-4819-9f2a-85d027cf1a84', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b97b-13eb-46e7-bb85-7b451638e100', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fb39-45d6-9c0e-9345afa0ca2b', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b9b2-8e64-407b-97a4-40fd707cb694', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fb80-4f2e-a0a9-615ed71b55df', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fdd3-43f1-bd7c-a3c9c20cf7d0', 'dropdown', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04ba19-1cf8-4bbb-a676-5407f922f803', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-fe25-4005-a1e9-ecfa9169e6d7', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04b914-980c-4f3a-97db-714495c4d673', '', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-ff49-46de-a221-1e322a5c7371', 'pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04baf0-6ea0-43ef-97c2-2b5bc55c5abe', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c848-ff97-4b3d-b5d9-98a29e6857d4', 'kotak-centang', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04bb16-e82e-4416-8d65-53726c095d30', '', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42'),
('9c04c849-00b7-4847-b9b4-5177fec9b60e', 'petak-pilihan-ganda', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '9c04bb52-7e14-499f-8ed7-fae56ece18fa', '', 1, '2024-05-11 08:05:40', '2024-05-11 08:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_jawaban_x`
--

CREATE TABLE `kuesioner_jawaban_x` (
  `id` char(36) NOT NULL,
  `jawaban_id` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuesioner_jawaban_x`
--

INSERT INTO `kuesioner_jawaban_x` (`id`, `jawaban_id`, `key`, `jawaban`, `created_at`, `updated_at`) VALUES
('9c04c094-816d-4ca3-b36f-99c498d31fa0', '9c04c094-80ff-4374-85b1-2f739ec681f8', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-81cd-486a-93f0-8ab480dc99e2', '9c04c094-80ff-4374-85b1-2f739ec681f8', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8252-4019-a38f-d77d6635e369', '9c04c094-80ff-4374-85b1-2f739ec681f8', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-82ac-457a-adfb-9e390797365c', '9c04c094-80ff-4374-85b1-2f739ec681f8', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8301-4fc3-978a-6b2c1d084760', '9c04c094-80ff-4374-85b1-2f739ec681f8', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8431-464b-8acc-51aa46e499a4', '9c04c094-83d4-4db5-8a44-57622488082d', '', '9c04b914-974e-45c0-80e5-cb501eb649b7', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8491-4480-a49b-e54ecfebce72', '9c04c094-83d4-4db5-8a44-57622488082d', '', '9c04b929-6b89-4e49-88ae-ab34c44daae3', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-85e3-4cc0-8520-ae6c25ea8176', '9c04c094-857c-4de3-853e-33a98a6e9caf', '', '9c04bb16-e742-468b-ac9b-803bf9a80a93', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8643-4dee-9135-88a6ee3ec2d5', '9c04c094-857c-4de3-853e-33a98a6e9caf', '', '9c04bb1b-715d-410a-bddc-e6045d14ff5f', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8728-423e-9799-ad79294af988', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8796-4ee2-9a6a-a167ae847ea0', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8800-4530-b410-4b6e8d47b317', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8895-4788-952e-00852dddab96', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8901-4416-a3f1-d6d1a0f75485', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8976-4ced-b841-aaa919fa848b', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c094-8a0d-4041-affd-fdd4a95947a9', '9c04c094-86c1-43c5-bf79-1b80d9c28f34', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 07:44:07', '2024-05-11 07:44:07'),
('9c04c696-60cc-44c3-9123-b282bb1ade8b', '9c04c696-607a-4854-a85a-61e416cc1b95', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6139-492f-bed1-9f10a734721c', '9c04c696-607a-4854-a85a-61e416cc1b95', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-619d-4838-b2bd-6ea3c74fc9f0', '9c04c696-607a-4854-a85a-61e416cc1b95', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-61e2-4a9f-b158-2dd6f12ff030', '9c04c696-607a-4854-a85a-61e416cc1b95', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6226-40c1-8eff-808a7256f01f', '9c04c696-607a-4854-a85a-61e416cc1b95', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6311-4d14-8310-540c6fb9ceff', '9c04c696-62b0-481a-8d6c-8bcda51b501f', '', '9c04b914-974e-45c0-80e5-cb501eb649b7', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6351-44dd-8157-d01e19feea67', '9c04c696-62b0-481a-8d6c-8bcda51b501f', '', '9c04b937-d2a5-4141-bb29-efffcfbc9bef', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6390-4217-93f7-82c6a12efdbe', '9c04c696-62b0-481a-8d6c-8bcda51b501f', '', '9c04b93f-491e-45a1-b9f5-c4a4899f7a77', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-6486-4474-98d5-0bc3ebef14c4', '9c04c696-641a-48eb-8fa6-fea673549f66', '', '9c04bb16-e742-468b-ac9b-803bf9a80a93', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-64c7-4b98-850e-df491a551012', '9c04c696-641a-48eb-8fa6-fea673549f66', '', '9c04bb22-25b8-435f-b714-b9400709c68a', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-654c-4a22-a49a-c14f46b24036', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-658c-4419-9594-fb69d2b52f4f', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-65ce-4f0d-9daa-634ce42a2538', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-663e-4ab0-88bb-82b90ac96369', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-667f-4d9a-a937-6785370f2408', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c696-66e0-40da-8857-9aa254e5d9ce', '9c04c696-650c-47cb-8ca3-35280d53cfcd', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:00:55', '2024-05-11 08:00:55'),
('9c04c704-b362-413e-8d1f-8866d827ff25', '9c04c704-b2f9-44a3-a302-b6c67277c6c7', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b3de-4f3b-bd82-574d085d48bd', '9c04c704-b2f9-44a3-a302-b6c67277c6c7', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b434-47a8-a641-fb08a77fc6b5', '9c04c704-b2f9-44a3-a302-b6c67277c6c7', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b481-489c-9516-03a5f72a9104', '9c04c704-b2f9-44a3-a302-b6c67277c6c7', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b4ce-4757-8fda-435bfc822450', '9c04c704-b2f9-44a3-a302-b6c67277c6c7', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b63c-4779-8abe-839b611501d4', '9c04c704-b5eb-4431-af4d-238ba52dce83', '', '9c04b914-974e-45c0-80e5-cb501eb649b7', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b6b0-4a50-9dd2-39ec4259dda2', '9c04c704-b5eb-4431-af4d-238ba52dce83', '', '9c04b929-6b89-4e49-88ae-ab34c44daae3', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b708-4312-9fff-37829afb3df5', '9c04c704-b5eb-4431-af4d-238ba52dce83', '', '9c04b947-17b9-4a7d-9c93-d186ecc4a914', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b7f3-48d5-bcef-77a07f75c7d0', '9c04c704-b7aa-486b-9016-20c249170f38', '', '9c04bb1b-715d-410a-bddc-e6045d14ff5f', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b872-4c33-b4a6-282fb25222ed', '9c04c704-b7aa-486b-9016-20c249170f38', '', '9c04bb22-25b8-435f-b714-b9400709c68a', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b8c5-4486-878d-758fcef0e213', '9c04c704-b7aa-486b-9016-20c249170f38', '', '9c04bb29-c0fa-40a2-a920-bae7fb0d09da', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b973-43a4-a682-266bff7f0ddd', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-b9f9-432d-ae3f-40ae5e8b342f', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-ba4f-44c3-aa34-444dbfa0f549', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-baa0-4299-b05f-3eedaf21536b', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-baf2-433d-94e0-3fdc1901ac9c', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-bb68-4f3b-b9aa-52dfce39f4f6', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c704-bbbd-49f0-8d01-9101d598d4a6', '9c04c704-b914-40e0-9f16-8bf9fcb3fc99', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:02:07', '2024-05-11 08:02:07'),
('9c04c762-3a2a-4e07-a078-978a6ef2689c', '9c04c762-39d3-4aad-bd2b-e081dd7c62c7', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3a79-41b5-8dbd-74e3ac31d9be', '9c04c762-39d3-4aad-bd2b-e081dd7c62c7', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3abe-4a01-bb9b-677c36abf223', '9c04c762-39d3-4aad-bd2b-e081dd7c62c7', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3b03-4c28-8c86-b2ce602216b9', '9c04c762-39d3-4aad-bd2b-e081dd7c62c7', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3b70-4a42-b253-12dcb371e80e', '9c04c762-39d3-4aad-bd2b-e081dd7c62c7', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3c3c-410f-9ec0-25e45e0cb461', '9c04c762-3bfd-4ae0-a561-e58c24dc5f38', '', '9c04b929-6b89-4e49-88ae-ab34c44daae3', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3c7b-444b-ac61-680311a5bb96', '9c04c762-3bfd-4ae0-a561-e58c24dc5f38', '', '9c04b930-f0d6-4b7b-b956-d1d5776cf832', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3df6-4275-a4c0-4dfeca349036', '9c04c762-3dad-4145-bb68-e5a50bda671b', '', '9c04bb22-25b8-435f-b714-b9400709c68a', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3e3c-4471-9cb5-f5ddf6c2c63b', '9c04c762-3dad-4145-bb68-e5a50bda671b', '', '9c04bb30-632f-400e-8a60-b3b87f3454e6', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3ee7-41b7-bcfc-6ede86dc1881', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3f24-44a0-9515-86f98ef81ea3', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3f5d-4ac6-97ce-979275f6243b', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-3fa1-4a02-b974-b0ad31fa25ec', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-4008-4a1b-971e-fb627426ba8f', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-4048-417d-874e-81d717170360', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c762-4088-45a1-ba80-626b930f1290', '9c04c762-3ea4-4d0e-9589-5b6ebacab8bc', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:03:09', '2024-05-11 08:03:09'),
('9c04c7de-259e-4c50-b4d3-e15b5214656d', '9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-25ee-4fc6-96db-dfe4ca55cb1d', '9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-263f-4736-b0d5-19b08a9d8d80', '9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2690-4657-ab3b-3185084c1656', '9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2706-40b7-a608-b421b0ff1133', '9c04c7de-24ba-4d8e-911a-c6dd3a2e8eaa', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2819-402c-bc22-5af093b809fd', '9c04c7de-27a2-49ca-b5bc-df914436fe6d', '', '9c04b930-f0d6-4b7b-b956-d1d5776cf832', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-288c-4ebc-83ee-94572a5815af', '9c04c7de-27a2-49ca-b5bc-df914436fe6d', '', '9c04b937-d2a5-4141-bb29-efffcfbc9bef', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-28d8-4bec-a02f-4e25dffe22ba', '9c04c7de-27a2-49ca-b5bc-df914436fe6d', '', '9c04b93f-491e-45a1-b9f5-c4a4899f7a77', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-29da-4f78-9d29-45b0bdeac541', '9c04c7de-2970-458d-8d62-59604df51283', '', '9c04bb1b-715d-410a-bddc-e6045d14ff5f', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2a25-4e75-9906-5bd7b6bdcf02', '9c04c7de-2970-458d-8d62-59604df51283', '', '9c04bb29-c0fa-40a2-a920-bae7fb0d09da', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2b00-4fb2-9427-4dc163f976e6', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2b44-44db-9e24-34a4418b7747', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2bba-4e77-bd2e-e85d405774ee', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2c07-45e0-9715-fbdd642a8c99', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2c55-4074-bb1b-e9ee63e576a7', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2ca6-4e9f-9c40-376a34960ddd', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c7de-2d52-4fd4-a35a-85b2f17ee622', '9c04c7de-2ab0-49f4-8b6d-7aa78cdf82da', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:04:30', '2024-05-11 08:04:30'),
('9c04c848-fbd2-40cd-aca4-e14e967d703a', '9c04c848-fb80-4f2e-a0a9-615ed71b55df', '9c04b9ca-de0f-4cd7-8e45-0512bcaaf842', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fc16-4f93-98fc-1bb1936176cc', '9c04c848-fb80-4f2e-a0a9-615ed71b55df', '9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fc59-4400-a04c-d9d95a36c747', '9c04c848-fb80-4f2e-a0a9-615ed71b55df', '9c04b9db-251b-4b4f-b466-eeac767bc88d', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fd30-4961-8456-862c7be09aae', '9c04c848-fb80-4f2e-a0a9-615ed71b55df', '9c04b9e1-ec1d-46b8-bc23-62b16e31c96e', '9c04ba06-33e5-4a42-bfe4-4b9ad893b681', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fd77-40bf-884e-e15fdabb2f21', '9c04c848-fb80-4f2e-a0a9-615ed71b55df', '9c04b9f3-1975-4111-a400-46c9bb44124d', '9c04ba01-ea08-4693-90ec-0571340cdc51', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fea2-45c3-87b0-ffb057a70d62', '9c04c848-fe25-4005-a1e9-ecfa9169e6d7', '', '9c04b914-974e-45c0-80e5-cb501eb649b7', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c848-fef8-469c-9fe9-e1a8f0d05c03', '9c04c848-fe25-4005-a1e9-ecfa9169e6d7', '', '9c04b929-6b89-4e49-88ae-ab34c44daae3', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-000d-4fd1-9061-5845ebf0f572', '9c04c848-ff97-4b3d-b5d9-98a29e6857d4', '', '9c04bb16-e742-468b-ac9b-803bf9a80a93', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-0061-456a-ba53-56aa0b3d7d2c', '9c04c848-ff97-4b3d-b5d9-98a29e6857d4', '', '9c04bb30-632f-400e-8a60-b3b87f3454e6', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-00fb-4c2b-b5e4-6330718f7a90', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb52-7d54-4d8e-9de6-68ec0ca73a89', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-01a7-4f8c-99a8-506c7d7f9e4c', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb5b-b367-4e19-92ec-517bddb9ecc8', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-01ec-416f-b9de-93aa6b1e076c', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb63-2ff0-4fc0-9383-4afeffb852ad', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-022d-43c5-8803-a44637f45c02', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c', '9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-0268-4dfb-b464-d4f752136d1a', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-02a9-4928-a458-429e3d749e42', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb7a-0efa-4c01-8e9b-2222cec68d50', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40'),
('9c04c849-0311-45c9-be79-a83a61d87675', '9c04c849-00b7-4847-b9b4-5177fec9b60e', '9c04bb80-b364-41f2-bc8f-98650e66f748', '9c04b9ca-deb7-4055-b35b-42e0d4cf70b9', '2024-05-11 08:05:40', '2024-05-11 08:05:40');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_jawaban_y`
--

CREATE TABLE `kuesioner_jawaban_y` (
  `jawaban_x_id` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner_soal`
--

CREATE TABLE `kuesioner_soal` (
  `id` char(36) NOT NULL,
  `kuesioner_id` varchar(255) NOT NULL,
  `kuesioner_halaman_id` varchar(255) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `opsi_x` text DEFAULT NULL,
  `opsi_y` text DEFAULT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuesioner_soal`
--

INSERT INTO `kuesioner_soal` (`id`, `kuesioner_id`, `kuesioner_halaman_id`, `pertanyaan`, `type`, `opsi_x`, `opsi_y`, `required`, `created_at`, `updated_at`) VALUES
('9c04b738-53a5-46a0-b147-32c9bdf3fa8d', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'Nama', 'jawab-text', '{\"9c04b738-52e1-4536-9c84-4b3a864d2cfa\":\"\"}', '{\"9c04b738-539b-4961-8bd6-d5292963d25d\":\"\"}', 1, '2024-05-11 07:17:57', '2024-05-11 07:19:57'),
('9c04b73a-8b21-4424-bb45-37b9fd4e36cb', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'Jenis Kelamin', 'pilihan-ganda', '{\"9c04b73a-8a44-422f-a3ef-95dac05eaf91\":\"Laki - Laki\",\"9c04b75e-7572-4918-be16-8e7a02076e3d\":\"Perempuan\"}', '{\"9c04b73a-8b14-467c-a858-856e1547c136\":\"\"}', 0, '2024-05-11 07:17:58', '2024-05-11 07:22:10'),
('9c04b7a8-c545-49ff-9ac7-89c7c584eb6b', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'Tahun Wisuda', 'jawab-angka', '{\"9c04b7a8-c497-4d9d-8aca-ccf947de0f83\":\"\"}', '{\"9c04b7a8-c53b-4cc3-b127-260b038566bf\":\"\"}', 0, '2024-05-11 07:19:10', '2024-05-11 07:19:15'),
('9c04b7b8-f0e1-4a7a-b799-9ddb8edffec6', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'NIM', 'jawab-text', '{\"9c04b7b8-f028-4b2d-9514-fa40392dcd37\":\"\"}', '{\"9c04b7b8-f0d2-4434-8955-69807463e819\":\"\"}', 0, '2024-05-11 07:19:21', '2024-05-11 07:19:24'),
('9c04b7d9-03b3-4aed-9ce5-5fa8993beab8', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'Alamat', 'jawab-text', '{\"9c04b7d9-02f5-4256-a69b-ddf18dedd085\":\"\"}', '{\"9c04b7d9-03a9-4ceb-9c7e-b676042dc052\":\"\"}', 0, '2024-05-11 07:19:42', '2024-05-11 07:19:49'),
('9c04b7e4-660d-462d-81c0-8f65843a11a3', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b427-9887-4af6-ac50-3adcbb80c967', 'Tanggal Lahir', 'jawab-tanggal', '{\"9c04b7e4-6554-4f3c-97ee-4afcfc7f457e\":\"\"}', '{\"9c04b7e4-6604-4c12-93dc-a7285ef282d2\":\"\"}', 0, '2024-05-11 07:19:50', '2024-05-11 07:19:54'),
('9c04b914-980c-4f3a-97db-714495c4d673', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b49b-7bca-4be8-b879-8ef47eb872e5', 'Pekerjaan anda saat ini bergerak dibidang apa (diisi jika bekerja)', 'kotak-centang', '{\"9c04b914-974e-45c0-80e5-cb501eb649b7\":\"Pemerintahan\",\"9c04b929-6b89-4e49-88ae-ab34c44daae3\":\"Universitas\\/Sekolah Tinggi\",\"9c04b930-f0d6-4b7b-b956-d1d5776cf832\":\"Perbankan\",\"9c04b937-d2a5-4141-bb29-efffcfbc9bef\":\"Industri\",\"9c04b93f-491e-45a1-b9f5-c4a4899f7a77\":\"Kesehatan\",\"9c04b947-17b9-4a7d-9c93-d186ecc4a914\":\"Teknologi Informasi\",\"9c04b94d-25be-46ba-ac16-fd02b0455398\":\"Lainnya\"}', '{\"9c04b914-9802-434d-bd84-f2f3d57091a3\":\"\"}', 1, '2024-05-11 07:23:09', '2024-05-11 07:26:19'),
('9c04b971-d82e-4ec3-9cf8-e9d64a3db701', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b488-8bb6-4d35-894a-e54cbc978f90', 'Berapa lama Anda menyelesaikan program studi Anda?', 'pilihan-ganda', '{\"9c04b971-d787-465c-a19b-24a375a22f18\":\"Kurang dari 3 tahun\",\"9c04b97b-13eb-46e7-bb85-7b451638e100\":\"3 tahun\",\"9c04b981-62ba-4059-a241-db5695b0d33a\":\"Lebih dari 3 tahun\"}', '{\"9c04b971-d825-4d81-ac50-c93a98fb5bd2\":\"\"}', 1, '2024-05-11 07:24:10', '2024-05-11 07:26:21'),
('9c04b992-b81f-414b-9f6e-f454bfb869c0', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b488-8bb6-4d35-894a-e54cbc978f90', 'Seberapa baik Anda merasa persiapan akademik Anda di perguruan tinggi membantu Anda dalam karier Anda?', 'pilihan-ganda', '{\"9c04b992-b770-45a3-a9e4-e7caabe1e6f2\":\"Sangat Baik\",\"9c04b99d-ac2d-415d-a403-96ee1b045f7c\":\"Baik\",\"9c04b9b2-8e64-407b-97a4-40fd707cb694\":\"Cukup\",\"9c04b9b6-a9a5-4641-9ff8-4e3f17300f8e\":\"Buruk\",\"9c04b9bc-d487-48aa-983e-6dce73d86ce9\":\"Sangat Buruk\"}', '{\"9c04b992-b816-40c6-8e87-381c420537f4\":\"\"}', 1, '2024-05-11 07:24:32', '2024-05-11 07:26:23'),
('9c04b9ca-dec1-4995-ae52-fd25f7a589dd', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b488-8bb6-4d35-894a-e54cbc978f90', 'Menurut anda seberapa besar penekanan pada metode pembelajaran perkuliahan dilaksanakan di program studi anda?', 'petak-pilihan-ganda', '{\"9c04b9ca-de0f-4cd7-8e45-0512bcaaf842\":\"Perkuliahan\",\"9c04b9d3-eba4-44ae-bc4d-c69ff34b3cc0\":\"Magang\",\"9c04b9db-251b-4b4f-b466-eeac767bc88d\":\"Praktikum\",\"9c04b9e1-ec1d-46b8-bc23-62b16e31c96e\":\"Kerja Lapangan\",\"9c04b9f3-1975-4111-a400-46c9bb44124d\":\"Diskusi\"}', '{\"9c04b9ca-deb7-4055-b35b-42e0d4cf70b9\":\"Sangat Besar\",\"9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663\":\"Besar\",\"9c04ba01-ea08-4693-90ec-0571340cdc51\":\"Cukup\",\"9c04ba06-33e5-4a42-bfe4-4b9ad893b681\":\"Kurang\",\"9c04ba09-e669-45e9-ac9f-708c6c9ea839\":\"Sangat Kurang\"}', 0, '2024-05-11 07:25:08', '2024-05-11 07:25:53'),
('9c04ba19-1dee-48e0-8e9b-00582c86ce12', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b488-8bb6-4d35-894a-e54cbc978f90', 'Pilih tingkat pendidikan tertinggi yang telah Anda capai setelah menyelesaikan program studi ini', 'dropdown', '{\"9c04ba19-1cf8-4bbb-a676-5407f922f803\":\"Sarjana\",\"9c04ba26-b2a0-4768-8afe-658f7af64723\":\"Magister\",\"9c04ba2a-c232-4ccb-ac4c-70eab9894f49\":\"Doktor\"}', '{\"9c04ba19-1de0-4090-9df0-8afcdddc19fc\":\"\"}', 1, '2024-05-11 07:26:00', '2024-05-11 07:26:27'),
('9c04badf-8483-4d96-a73c-4ba2775b9efb', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b49b-7bca-4be8-b879-8ef47eb872e5', 'Jika sebelum lulus, Berapa bulan waktu yang dihabiskan untuk memperoleh pekerjaan utama?', 'pilihan-ganda', '{\"9c04badf-83b6-4c94-aae3-b1f7bdc27c25\":\"< 1 bulan\",\"9c04bae9-d976-4f50-8844-1daf4ec87ae9\":\"3 \\u2013 6 bulan\",\"9c04baf0-6ea0-43ef-97c2-2b5bc55c5abe\":\" 6 \\u2013 12 bulan\",\"9c04baf7-a622-424e-9c11-9f00507205b6\":\"12 \\u2013 18 bulan\"}', '{\"9c04badf-8479-4183-9878-26b40b06bb58\":\"\"}', 0, '2024-05-11 07:28:10', '2024-05-11 07:28:32'),
('9c04bb16-e82e-4416-8d65-53726c095d30', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b49b-7bca-4be8-b879-8ef47eb872e5', 'Jelaskan status anda saat ini', 'kotak-centang', '{\"9c04bb16-e742-468b-ac9b-803bf9a80a93\":\"Bekerja (full time\\/part time)\",\"9c04bb1b-715d-410a-bddc-e6045d14ff5f\":\"Wiraswasta\",\"9c04bb22-25b8-435f-b714-b9400709c68a\":\"Melanjutkan pendidikan\",\"9c04bb29-c0fa-40a2-a920-bae7fb0d09da\":\"Tidak kerja tetapi sedang mencari kerja\",\"9c04bb30-632f-400e-8a60-b3b87f3454e6\":\" Belum memungkinkan bekerja\"}', '{\"9c04bb16-e825-47ca-94a2-2bf41f786a7e\":\"\"}', 0, '2024-05-11 07:28:46', '2024-05-11 07:29:13'),
('9c04bb52-7e14-499f-8ed7-fae56ece18fa', '9c04b393-6c7e-4092-b30b-5b81e0392e49', '9c04b49b-7bca-4be8-b879-8ef47eb872e5', 'Pada saat ini pada tingkat mana kompetensi di bawah ini diperlukan dalam pekerjaan?', 'petak-pilihan-ganda', '{\"9c04bb52-7d54-4d8e-9de6-68ec0ca73a89\":\"Etika\",\"9c04bb5b-b367-4e19-92ec-517bddb9ecc8\":\"Keahlian berdasarkan bidang ilmu\",\"9c04bb63-2ff0-4fc0-9383-4afeffb852ad\":\"Bahasa Inggris\",\"9c04bb6a-3c10-444a-9f0d-987f1c1c1a9c\":\"Penggunaan Teknologi Informasi\",\"9c04bb71-dd9d-4f0c-a0e6-13d1fbc9da59\":\"Komunikasi\",\"9c04bb7a-0efa-4c01-8e9b-2222cec68d50\":\"Kerja sama tim\",\"9c04bb80-b364-41f2-bc8f-98650e66f748\":\"Pengembangan Diri\"}', '{\"9c04b9ca-deb7-4055-b35b-42e0d4cf70b9\":\"Sangat Besar\",\"9c04b9fd-e1e9-4f3c-8bf4-07aad8b85663\":\"Besar\",\"9c04ba01-ea08-4693-90ec-0571340cdc51\":\"Cukup\",\"9c04ba06-33e5-4a42-bfe4-4b9ad893b681\":\"Kurang\",\"9c04ba09-e669-45e9-ac9f-708c6c9ea839\":\"Sangat Kurang\"}', 0, '2024-05-11 07:29:25', '2024-05-11 07:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_05_062649_create_prodi_table', 1),
(6, '2024_03_05_062914_create_periode_table', 1),
(7, '2024_03_12_021141_create_kuesioner_table', 1),
(8, '2024_03_12_031637_create_kuesioner_halaman_table', 1),
(9, '2024_03_14_020251_create_kuesioner_soal_table', 1),
(10, '2024_03_19_055800_create_kuesioner_jawaban_table', 1),
(11, '2024_03_19_055831_create_kuesioner_jawaban_x_table', 1),
(12, '2024_03_19_055834_create_kuesioner_jawaban_y_table', 1),
(13, '2024_04_01_002349_create_pengunjung_table', 1),
(14, '2024_05_11_132242_create_jurusan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `tanggal`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, '2024-05-11', 14, '2024-05-11 14:55:11', NULL),
(2, '2024-05-10', 24, '2024-05-10 14:55:19', NULL),
(3, '2024-05-09', 18, '2024-05-09 14:55:33', NULL),
(4, '2024-05-08', 28, '2024-05-08 14:55:52', NULL),
(5, '2024-05-07', 31, '2024-05-07 14:56:20', NULL),
(6, '2024-05-06', 45, '2024-05-05 14:58:13', NULL),
(7, '2024-05-04', 18, '2024-05-04 14:58:24', NULL),
(8, '2024-05-03', 27, '2024-05-03 14:58:33', NULL),
(9, '2024-05-02', 15, '2024-05-02 14:58:55', NULL),
(10, '2024-05-06', 19, '2024-05-06 14:59:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`kode`, `nama`, `created_at`, `updated_at`) VALUES
('P2018', '2018', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('P2019', '2019', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('P2020', '2020', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('P2021', '2021', '2024-05-11 05:49:07', '2024-05-11 05:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode`, `jurusan`, `nama`, `created_at`, `updated_at`) VALUES
('ARSITEKTUR', 'JPTSP', 'Arsitektur', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('MO', 'JPTO', 'Mesin Otomotif', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PKK', 'JPKK', 'Pendidikan Kesejahteraan Keluarga', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTB', 'JPTSP', 'Pendidikan Teknik Bangunan', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTE', 'JPTE', 'Pendidikan Teknik Elektronika', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTELEKTRO', 'JPTELEKTRO', 'Pendidikan Teknik Elektro', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTIK', 'JTIK', 'Pendidikan Teknik Informatika dan Komputer', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTM', 'JPTM', 'Pendidikan Teknik Mesin', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTO', 'JPTO', 'Pendidikan Teknik Otomotif', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PTP', 'JPTP', 'Pendidikan Teknologi Pertanian', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('PVM', 'JPTE', 'Pendidikan Vokasional Mekatronika', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('RE', 'JPTELEKTRO', 'Rekayasa Elektro', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('STTE', 'JPTELEKTRO', 'Sarjana Terapan Teknik Elektro', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('TED3', 'JPTE', 'Teknik Elektronika (D3)', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('TED4', 'JPTE', 'Teknik Elektronika (D4)', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('TI', 'JTIK', 'Teknik Informatika', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('TMST', 'JPTM', 'Teknik Mesin Sarjana Terapan', '2024-05-11 05:49:07', '2024-05-11 05:49:07'),
('TSBG', 'JPTSP', 'Teknik Sipil Bangunan Gedung', '2024-05-11 05:49:07', '2024-05-11 05:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `nim` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `prodi` varchar(255) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `tempat_kerja` varchar(255) DEFAULT NULL,
  `alamat_kerja` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `nama`, `email`, `password`, `nomor_telepon`, `role`, `alamat`, `provinsi`, `kabupaten_kota`, `jurusan`, `prodi`, `periode`, `tempat_kerja`, `alamat_kerja`, `foto`, `aktif`, `email_verified_at`, `last_login_at`, `last_login_ip`, `remember_token`, `created_at`, `updated_at`) VALUES
('9bdb6036-829c-4cb6-9a5c-a3c0df7a837f', '200209502008', 'Alfian Hanafi', 'muh.alfian03@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', '085241990126', 'alumni', 'GoaRia', NULL, 'Makassar', NULL, 'PTIK', 'P2021', NULL, NULL, NULL, 1, NULL, '2024-05-11 07:59:35', '127.0.0.1', NULL, '2024-04-20 18:05:43', '2024-05-11 07:59:48'),
('9bdb6a0d-e6f1-4d77-bad0-9c0b497ea92f', '200209502025', 'Adji Putratama', 'adjiputratama75@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2021', NULL, NULL, NULL, 1, NULL, '2024-05-11 08:01:12', '127.0.0.1', NULL, '2024-04-20 18:33:14', '2024-05-11 08:01:12'),
('9bdb957e-2d56-419b-912e-b17065ca2c62', '200209501043', 'Naufal ', 'naufalfalaqi21@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2021', NULL, NULL, NULL, 1, NULL, '2024-04-20 23:14:33', '140.213.226.197', NULL, '2024-04-20 20:34:42', '2024-04-20 23:14:33'),
('9bdbcbe7-0763-45c2-ad0e-b35510685c70', '200209502072', 'Muh. Farid Syamsuar', 'faridsyamsuar002@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2020', NULL, NULL, NULL, 1, NULL, '2024-05-11 08:02:21', '127.0.0.1', NULL, '2024-04-20 23:06:50', '2024-05-11 08:02:21'),
('9bdbd09d-80e0-4247-b4da-755f7df4ca4a', '200209501004', 'Suhardi Bin Kimang ', 'suhardibinkimangwrk@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-20 23:20:07', '114.10.135.195', NULL, '2024-04-20 23:20:01', '2024-04-20 23:20:07'),
('9bdc06d5-66c1-4a53-820d-05fb1c40211b', '1129040232', 'Wardiman', 'iman.potlot@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2016', NULL, NULL, NULL, 1, NULL, '2024-04-21 01:51:48', '114.10.134.243', NULL, '2024-04-21 01:51:37', '2024-04-21 01:51:48'),
('9bdc081e-a39c-4490-934e-fad22e6e82a9', '1429041037', 'Nursuci ramadani', 'ramadaninursuci28@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2021', NULL, NULL, NULL, 1, NULL, '2024-05-11 08:03:22', '127.0.0.1', NULL, '2024-04-21 01:55:13', '2024-05-11 08:03:29'),
('9bdc0d20-67e7-408f-9e39-1347eef4d5e7', '1923323231', 'Bagas', 'bagas@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2017', NULL, NULL, NULL, 1, NULL, '2024-04-21 02:09:34', '182.1.163.45', NULL, '2024-04-21 02:09:13', '2024-04-21 02:09:34'),
('9bdc2e42-558c-444d-ba34-56d444514b3a', '1429040043', 'Muhammad Taufik Wardiman', 'cukkaulu29@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', 'JL. Sukaria 1', 'Sulawesi Selatan', 'Makassar', NULL, 'PTIK', 'P2021', 'PT. Naila Karya Ibdah', 'BTP', NULL, 1, NULL, '2024-04-21 03:42:00', '114.10.134.204', NULL, '2024-04-21 03:41:52', '2024-04-21 03:47:28'),
('9bdc5832-de7c-4814-a85b-43ab528b1d5f', '1429042070', 'Nur Fitri', 'nurfit3.nf@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2018', NULL, NULL, NULL, 1, NULL, '2024-04-21 05:39:23', '114.125.218.238', NULL, '2024-04-21 05:39:08', '2024-04-21 05:39:23'),
('9bdc65fe-9bd4-4563-a196-32539f20f891', '200209552019', 'Fathul Rahman', 'rahmanfathul16@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-21 06:18:03', '180.253.57.251', NULL, '2024-04-21 06:17:42', '2024-04-21 06:18:03'),
('9bdc6be6-1df0-42b2-a3aa-3101fdfcb62c', '200209502109', 'Megawati', 'thvmegaa@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-21 06:34:26', '140.213.1.93', NULL, '2024-04-21 06:34:13', '2024-04-21 06:34:26'),
('9bdc6bf1-7da0-44a3-8b83-1d3e67458a7f', '200209500004', 'Andi Nur Hanifa Rofifah H', 'nurhanifaulvt345@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-21 06:34:35', '36.74.124.241', NULL, '2024-04-21 06:34:20', '2024-04-21 06:34:35'),
('9bdc6fc6-838f-4268-9f95-f7a59c11e2ce', '200209502055', 'Rusmawati Rahmi', 'Rusmawatirahmi14@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2020', NULL, NULL, NULL, 1, NULL, '2024-05-11 08:04:53', '127.0.0.1', NULL, '2024-04-21 06:45:03', '2024-05-11 08:04:53'),
('9bdc708f-d35d-4f53-9403-f91409dc852f', '200209501062', 'Widya Ainun Lestari ', 'whidyaaynun12@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-21 06:47:25', '114.10.135.159', NULL, '2024-04-21 06:47:15', '2024-04-21 06:47:25'),
('9be56fad-f9a8-41bf-abf9-90149f9363f4', '1929041004', 'Dwi Gusna', 'dwigusna97@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2023', NULL, NULL, NULL, 1, NULL, '2024-04-25 18:07:29', '114.79.37.255', NULL, '2024-04-25 18:07:14', '2024-04-25 18:07:29'),
('9be593b5-ac09-408e-828f-5a8b95e84c75', '200209501038', 'Sitti Nur Syafaa', 'nursyafaa28@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-25 19:48:08', '182.1.166.48', NULL, '2024-04-25 19:47:59', '2024-04-25 19:48:08'),
('9be5d68f-6aec-473f-8da2-1b4efc0317f2', '200209500017', 'St. Sulaeha Basir', 'sulaehabasir0810@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-25 22:55:02', '114.79.38.196', NULL, '2024-04-25 22:54:55', '2024-04-25 22:55:02'),
('9be5d84b-e94e-4350-af82-315b96ac8cef', '1929142055', 'Nurul Rahma', 'nurulrahma1205@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', '089694130050', 'alumni', 'Btp', 'Sulawesi selatan', 'Kota makassar', NULL, 'TIK', 'P2023', NULL, NULL, NULL, 1, NULL, '2024-04-25 22:59:53', '114.10.135.21', NULL, '2024-04-25 22:59:46', '2024-04-25 23:01:29'),
('9be5ed12-7c37-4838-bdb2-44ddd9b98aba', '200209501073', 'ASMAWATI NUR', 'ASMAWATHY13@GMAIL.COM', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-26 00:00:56', '180.249.174.115', NULL, '2024-04-25 23:57:52', '2024-04-26 00:00:56'),
('9beb7f42-6d26-45f1-a0a5-5c7be924b13d', '200209502071', 'Nurfadilah Istiqamah ', 'nrfdlhistqmh@gmail.com', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2024', NULL, NULL, NULL, 1, NULL, '2024-04-28 18:25:55', '114.10.135.50', NULL, '2024-04-28 18:25:46', '2024-04-28 18:25:55'),
('9c049775-0f0f-4bba-afa8-f481d929f9ec', '200209501019', 'Mitra', 'mitra@email', '$2y$12$UwxyBconRp3QNkccJWjUzu79vq35h4ys3EoQpbb/zIiS.Z6dqUwDm', NULL, 'alumni', NULL, NULL, NULL, NULL, 'PTIK', 'P2020', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2024-05-11 05:49:08', '2024-05-11 05:49:08'),
('9c049775-13a3-4672-949f-1f7cfe17f7bc', NULL, 'Admin', 'admin@email', '$2y$12$xf5JlCTs3NvGvW4k0nA09OnJxGqa5oFgNNv0kVC26BWHKNbn4JNS6', NULL, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2024-05-11 08:09:14', '127.0.0.1', NULL, '2024-05-11 05:49:08', '2024-05-11 08:09:14'),
('9c04bf80-ca7c-422e-9eef-d4f82db6952e', '200209501000', 'Mitra', 'mitra09@email', '$2y$12$O./TShBxgbOd96XxlF6OQ.yjbjVgdNcf3blN191rEhXAuiAWdrPqu', '085241990126', 'alumni', 'GoaRia', 'Sulawesi Selatan', 'Makassar', 'JTIK', 'PTIK', 'P2020', '-', 'GoaRia', 'DPpgSCGwfZjoXIDXH1R9V6Onrx00nguteymPi2Ew.jpg', 1, NULL, '2024-05-11 07:41:38', '127.0.0.1', NULL, '2024-05-11 07:41:06', '2024-05-11 07:42:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_halaman`
--
ALTER TABLE `kuesioner_halaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_jawaban`
--
ALTER TABLE `kuesioner_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuesioner_jawaban_x`
--
ALTER TABLE `kuesioner_jawaban_x`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kuesioner_jawaban_x_jawaban_id_foreign` (`jawaban_id`);

--
-- Indexes for table `kuesioner_jawaban_y`
--
ALTER TABLE `kuesioner_jawaban_y`
  ADD KEY `kuesioner_jawaban_y_jawaban_x_id_foreign` (`jawaban_x_id`);

--
-- Indexes for table `kuesioner_soal`
--
ALTER TABLE `kuesioner_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kuesioner_jawaban_x`
--
ALTER TABLE `kuesioner_jawaban_x`
  ADD CONSTRAINT `kuesioner_jawaban_x_jawaban_id_foreign` FOREIGN KEY (`jawaban_id`) REFERENCES `kuesioner_jawaban` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kuesioner_jawaban_y`
--
ALTER TABLE `kuesioner_jawaban_y`
  ADD CONSTRAINT `kuesioner_jawaban_y_jawaban_x_id_foreign` FOREIGN KEY (`jawaban_x_id`) REFERENCES `kuesioner_jawaban_x` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

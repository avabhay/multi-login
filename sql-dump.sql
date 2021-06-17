--
-- Database: `multilogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `password`, `role`, `created`) VALUES
(6, 'MADHUBALA', 'madhu123', '0b7afda982f3c14e4f74c5d01c662da7', 'Head', '2021-06-17 14:01:40'),
(7, 'Raman', 'raman123', 'da6df37c779ee033f5915c124182c7df', 'Sub-Counsellor', '2021-06-17 14:01:49'),
(8, 'Rohit', 'rohit123', '1db2cd81f19741d67e4c7aef245a689e', 'Center', '2021-06-17 14:01:54'),
(9, 'Abhay', 'abhay123', '51adfb6733c245efe399f59e45587a6d', 'Admin', '2021-06-17 14:07:19'),
(10, 'Nancy', 'nancy123', '4e459e9dc2788b5ec6c7496ec3b57f8d', 'Counsellor', '2021-06-17 14:07:41');

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;
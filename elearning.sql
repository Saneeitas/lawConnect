-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 11:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(2, 'BSc Software Engineering'),
(3, 'BSc Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `overview`
--

CREATE TABLE `overview` (
  `id` int(11) NOT NULL,
  `course_title` varchar(1000) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `credit_unit` varchar(255) DEFAULT NULL,
  `course_desc` text DEFAULT NULL,
  `course_overview` text DEFAULT NULL,
  `course_id` varchar(1000) DEFAULT NULL,
  `level` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `overview`
--

INSERT INTO `overview` (`id`, `course_title`, `course_code`, `credit_unit`, `course_desc`, `course_overview`, `course_id`, `level`) VALUES
(7, 'Introduction to Web Technologies', 'SEN1211', '2', 'Introduction to Web Technologies is a course that provides an overview of the essential components and skills needed to create websites and web applications. It covers topics such as HTML, CSS, and JavaScript for building web pages, as well as server-side programming, databases, and APIs for back-end development. Students gain hands-on experience and learn about web design, interactivity, and web performance optimization. By the end of the course, students should have a solid foundation in web technologies and be capable of building simple web projects.', 'The course \"Introduction to Web Technologies\" provides a comprehensive introduction to the fundamental concepts, tools, and technologies used in building websites and web applications. Students will gain a solid understanding of the key components involved in creating web-based solutions and develop practical skills in web development.', '2', '100'),
(8, 'Introduction to Computer science', 'CSC1311', '3', '\"Introduction to Computer Science\" is an introductory course designed to provide students with a comprehensive overview of the fundamental concepts and principles in computer science. The course aims to develop students understanding of the core ideas that underlie computing and to equip them with essential skills for problem-solving and algorithmic thinking. Students will learn about the basic components of a computer system, programming languages, data structures, algorithms, and the overall process of software development.', '\"Introduction to Computer Science\" is a comprehensive introductory course that provides students with a solid foundation in the fundamental concepts of computer science. The course covers topics such as computer systems, programming languages, data structures, algorithms, and software development. Students will learn about the history and components of computers, programming paradigms, and essential programming concepts. They will gain hands-on experience with programming languages like Python or Java, and learn about data structures and algorithms. Additional topics like computer networks, databases, and software engineering principles may also be covered. Throughout the course, students will engage in practical exercises and projects to reinforce their learning and develop problem solving skills. By the end of the course, students will have the necessary skills and knowledge to pursue further studies or careers in computer science.', '3', '100'),
(9, 'Software Engineering Process', 'SEN2212', '2', 'The Software Engineering Process course is designed to provide students with a comprehensive understanding of the methodologies and practices involved in developing high quality software. The course covers various aspects of the software development lifecycle, including requirements analysis, design, implementation, testing, deployment, and maintenance. Students will learn about different software development processes, such as the waterfall model, iterative models, and agile methodologies. The course also emphasizes the importance of teamwork, communication, and project management skills in software engineering.', 'The Software Engineering Process course covers various topics such as requirements engineering, software design, implementation, testing, deployment, and project management, equipping students with the necessary knowledge and skills to develop high-quality software effectively.', '2', '200'),
(10, 'Discrete Structure', 'CSC2222', '2', 'Discrete Structures explores mathematical concepts and structures that deal with discrete objects, which are distinct and separate entities. Unlike continuous objects, which involve measurements and real numbers, discrete structures deal with countable and finite objects. The course aims to develop students analytical and problem-solving skills by providing them with a strong foundation in the fundamental principles of discrete mathematics.', 'Discrete Structures is a foundational course in computer science and mathematics that focuses on the study of discrete mathematical structures and their applications. It serves as a fundamental building block for various areas of computer science, including algorithms, data structures, cryptography, and theoretical computer science.', '3', '200'),
(11, 'Web Application Development', 'SEN3311', '3', 'The Web Application Development course is designed to provide students with a comprehensive understanding of the principles and techniques involved in developing dynamic and interactive web applications. Throughout the course, students will learn the necessary skills to design, develop, and deploy web applications using a variety of technologies, frameworks, and programming languages.', 'The Web Application Development course provides a comprehensive understanding of designing, developing, and deploying dynamic web applications. Students learn front-end development with HTML, CSS, and JavaScript, as well as popular frameworks like React or Angular. They also explore server-side programming with languages like Python or Node.js, and gain knowledge of databases and data persistence. The course covers security considerations, authentication, and deployment strategies. Through hands-on projects, students develop practical skills in web application development and collaboration. Upon completion, students are equipped to create functional and interactive web applications.', '2', '300'),
(12, 'Software Testing and QA', 'SEN3322', '3', 'The course on Software Testing and Quality Assurance (QA) is designed to provide students with a comprehensive understanding of the principles, techniques, and best practices involved in software testing. The course covers various aspects of software quality assurance, including the importance of testing in the software development life cycle, the different testing methodologies, and the tools and techniques used to ensure software quality.', 'Throughout the course, students engage in hands-on exercises, case studies, and real-world projects to apply their knowledge and reinforce their understanding of software testing and QA concepts. By the end of the course, students should be equipped with the skills necessary to effectively plan, execute, and manage software testing activities to ensure high-quality software products.', '2', '300'),
(13, 'Human Computer Interface', 'CSC4211', '2', 'The Human-Computer Interface (HCI) course is designed to provide students with a comprehensive understanding of the principles, theories, and practices related to the interaction between humans and computer systems. It explores the design, development, and evaluation of user interfaces to ensure effective communication and interaction between users and computers.', 'Throughout the course, students typically engage in hands-on projects, assignments, and discussions to apply the concepts learned and gain practical experience in designing and evaluating user interfaces. They may also have the opportunity to study real-world examples, case studies, and HCI best practices.', '3', '400'),
(14, 'Software Engineering Economics', 'SEN4221', '2', 'Software Engineering Economics is a specialized course that explores the economic aspects of software development projects. It focuses on the application of economic principles, cost analysis techniques, and decision-making models to effectively manage software engineering projects. The course delves into the economic factors that influence software development, such as project budgeting, resource allocation, risk assessment, and return on investment (ROI) analysis.', 'Software Engineering Economics provides students with a comprehensive understanding of the financial considerations associated with software development. The course covers various topics and techniques that enable individuals to make informed decisions and optimize the economic outcomes of software projects.', '2', '400');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `credit_unit` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `credit_unit`) VALUES
(1, '1 '),
(2, '2 '),
(3, '3 '),
(4, '4 '),
(5, '5 '),
(6, '6 ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'sanee itas', 'saneeitas@gmail.com', 'user', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overview`
--
ALTER TABLE `overview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `overview`
--
ALTER TABLE `overview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

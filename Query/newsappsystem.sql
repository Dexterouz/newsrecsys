-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 12:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsappsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `password`) VALUES
(1, 'admin', 'Dexterous', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `post_news`
--

CREATE TABLE `post_news` (
  `post_id` int(11) NOT NULL,
  `post_topic` varchar(100) NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_summary` text,
  `post_article` text NOT NULL,
  `post_cat` varchar(150) NOT NULL,
  `post_date` date DEFAULT NULL,
  `post_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_news`
--

INSERT INTO `post_news` (`post_id`, `post_topic`, `post_author`, `post_summary`, `post_article`, `post_cat`, `post_date`, `post_time`) VALUES
(3, 'sports news', 'derik', 'A quick brief of the sports news around the world', 'The next step is to generate a second generation population of solutions from those selected through a combination of genetic operators: crossover (also called recombination), and mutation.\r\n\r\nFor each new solution to be produced, a pair of "parent" solutions is selected for breeding from the pool selected previously. By producing a "child" solution using the above methods of crossover and mutation, a new solution is created which typically shares many of the characteristics of its "parents". New parents are selected for each new child, and the process continues until a new population of solutions of appropriate size is generated. Although reproduction methods that are based on the use of two parents are more "biology inspired", some research[3][4] suggests that more than two "parents" generate higher quality chromosomes.\r\n\r\nThese processes ultimately result in the next generation population of chromosomes that is different from the initial generation. Generally the average fitness will have increased by this procedure for the population, since only the best organisms from the first generation are selected for breeding, along with a small proportion of less fit solutions. These less fit solutions ensure genetic diversity within the genetic pool of the parents and therefore ensure the genetic diversity of the subsequent generation of children.\r\n\r\nOpinion is divided over the importance of crossover versus mutation. There are many references in Fogel (2006) that support the importance of mutation-based search.\r\n\r\nAlthough crossover and mutation are known as the main', 'sports', '2018-06-13', '06:07:05'),
(4, 'brazil vs croatia', 'neyo', 'A comprehensive report on the match between Brazil and Croatia', 'Although crossover and mutation are known as the main genetic operators, it is possible to use other operators such as regrouping, colonization-extinction, or migration in genetic algorithms.[5]\r\n\r\nIt is worth tuning parameters such as the mutation probability, crossover probability and population size to find reasonable settings for the problem class being worked on. A very small mutation rate may lead to genetic drift (which is non-ergodic in nature). A recombination rate that is too high may lead to premature convergence of the genetic algorithm. A mutation rate that is too high may lead to loss of good solutions, unless elit', 'sports', '2018-06-13', '06:21:40'),
(6, 'jason jordan''s relationship with kurt angle', 'Dexterous', 'A brief bio about Jason Jordan''s History and his relationship with Kurt Angle, is Jordan the son of Kurt Angle the one time WWE superstar', 'Jason Jordan is an upcoming WWE superstar who has shown a lot of promising talents in the rings well built, handsome and strong. he possess a characteristic that is so charming for quite a young man of his age, wrestling with so many top notch wrestlers in the game, he has garnered a lot of experiences both from the match he won and the ones he lost. he is sure to supersede kurt angle as one of the greatest in the game. ', 'entertainment', '2018-06-18', '14:42:15'),
(7, 'Who is Arnelle Simpson', 'Godson', 'Arnelle Simpson, the last name â€œSimpsonâ€ is a popular name in the US that is associated with the mysterious gruesome murder of murder of two person.\r\nArnelle simpson is the oldest daughter of former NFL star player OJ Simpson, a man charge with the death of his second wife Nicole Simpson Brown and her friend Ron Goldman in 1994', 'Arnelle Simpson, the last name â€œSimpsonâ€ is a popular name in the US that is associated with the mysterious gruesome murder of murder of two person.\r\nArnelle simpson is the oldest daughter of former NFL star player OJ Simpson, a man charge with the death of his second wife Nicole Simpson Brown and her friend Ron Goldman in 1994. Arnelle was born on December 4, 1968 to the family of OJ Simpson(father) and Marguerite Whitley(mother), she is the most recognized of all OJ Simpson children. She had other siblings, Jason Simpson and Aaren Simpson the latter of which died at the age of two. She is well known to have been heavily involved in her fatherâ€™s trials and hearings both in 1994 and 2008, so everything about popularity revolves around her fatherâ€™s court trials.\r\nOj Simpson nickname â€œjuiceâ€ was born on July 9, 1947 in San Francisco, California, his mother Eunice, was a hospital administrator while the father jimmy lee Simpson was a chef and a bank custodian.\r\nOJ was a popular NFL football player back in his playing days; he attended the University of Southern California where he played football for the USC Trojans. Professionally he played as a running back in the NFL for 11 seasons for the Buffalo Bills, San Francisco 49ers from 1969 to 1979. He holds the record for the single season yards-per-game average which is 143.1.\r\nIn 1994, Simpson was arrested and charged with the murder of his ex-wife Nicole Simpson Brown and her friend Rob Goldman. It was a lengthy and internationally publicized trial that garnered mixed reactions from people all over US and everyone watching the trial with racism and indiscrimination being one of the factor that prolong the trial. He was however acquitted by the jury but the families of the victims filed a civil suit against him in the year 1997, the civil court served a $35million judgment against Simpson for the victims â€œwrongful deathâ€. During all this trial, Arnelle was behind her father giving him the much support he needed, making testimony on his behalf when called upon.\r\nIn 2007, O.J Simpson was arrested again in Los Angeles Nevada with criminal charge of arm robbery and kidnapping. In 2008 he was found guilty of all the crime charge labeled against him and was sentenced to 33years imprisonment with minimum of 4 years without parole, on July 20, 2017, he was granted parole and was eligible for release on October 1, 2017.\r\n', 'gossips', '2018-06-19', '15:18:59'),
(8, 'Jason jordan biography', 'louis', 'A quick bio on the life of Nathan Evanhart', 'Nathan Everhart[1] (born September 28, 1988)[1] is an American professional wrestler and former amateur wrestler. He is signed to WWE, where he performs on the Raw brand under the ring name Jason Jordan. As of February 2018, he is on hiatus due to a neck injury. Everhart signed a WWE contract in 2011 and was sent to its developmental territory Florida Championship Wrestling (FCW), before debuting in NXT the following year. In 2015, he formed the tag team American Alpha with Chad Gable, with the duo capturing the NXT Tag Team Championships before being drafted to SmackDown and winning the SmackDown Tag Team Championship. In 2017, American Alpha disbanded when Jordan debuted on the Raw brand as the storyline son of Raw General Manager Kurt Angle. He is the first and, thus far, only man to win the Raw, SmackDown, and NXT Tag Team Championships. He also held the FCW Tag Team Championship before FCW became NXT.', 'entertainment', '2018-06-23', '10:48:10'),
(9, 'Scoring against Argentina and outshining Messi is easy for ''Lionel Musa''', 'angel', 'The attacker inspired Nigeria to a win over Iceland to give them a good chance of reaching the last-16, and is confident of beating Argentina ', 'Ahmed Musa is ready to inspire Nigeria to victory over Argentina in their final World Cup group game, having apparently been described as "Lionel Musa" in South America.\r\nThe 25-year-old scored both goals in the 2-0 win over Iceland in Volgograd on Friday, which lifted Nigeria into second in Group D.\r\nThe result also means Argentina''s hopes of reaching the last 16 are still alive, despite their damaging 3-0 loss to Croatia, with Jorge Sampaoli''s side knowing that a win over Nigeria in St Petersburg on Tuesday could be enough to see them through.\r\nMusa''s double took him to four goals at the World Cup for his country, making him their top scorer at international football''s showpiece event, and has apparently led to Argentina fans dubbing him "Lionel Musa" in thanks for him keeping their side alive in Russia.\r\nThe Leicester City man found the nickname amusing when speaking to the media after the win over Iceland, and warned the real Messi that he has a habit of scoring against his teams, having netted doubles in both a loss to Argentina at the 2014 World Cup and in the International Champions Cup clash with Barcelona in 2016.', 'sports', '2018-06-23', '16:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `sub_id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_email` varchar(150) NOT NULL,
  `sub_cat` varchar(50) NOT NULL,
  `sub_date` date DEFAULT NULL,
  `sub_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`sub_id`, `sub_name`, `sub_email`, `sub_cat`, `sub_date`, `sub_time`) VALUES
(1, 'kenechukwu', 'dexterouskc@gmail.com', 'sports', '2018-06-13', '05:06:38'),
(2, 'Godson', 'kcegwugod@yahoo.com', 'science_tech', '2018-06-13', '05:53:03'),
(6, 'diana', 'diana@yahoo.com', 'gossips', '2018-06-22', '15:46:32'),
(12, 'john doe', 'johndoe@hotmail.com', 'entertainment', '2018-06-23', '10:37:15'),
(13, 'mark', 'mark@hotmail.com', 'sports', '2018-06-23', '16:41:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_news`
--
ALTER TABLE `post_news`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post_news`
--
ALTER TABLE `post_news`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

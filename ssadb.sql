-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2017 at 04:26 AM
-- Server version: 5.00.15
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ssadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `interviewround`
--

CREATE TABLE IF NOT EXISTS `interviewround` (
  `interviewroundid` int(5) NOT NULL auto_increment,
  `interviewid` int(5) NOT NULL,
  `roundname` varchar(20) NOT NULL,
  `rounddate` date NOT NULL,
  `totalmarks` int(3) NOT NULL,
  `passingmark` int(3) NOT NULL,
  `roundstatus` varchar(20) default NULL,
  PRIMARY KEY  (`interviewroundid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `interviewround`
--

INSERT INTO `interviewround` (`interviewroundid`, `interviewid`, `roundname`, `rounddate`, `totalmarks`, `passingmark`, `roundstatus`) VALUES
(1, 1, 'Round 1', '2017-02-28', 100, 30, 'Complete'),
(2, 1, 'Round 2', '2017-03-01', 100, 50, 'Panding');

-- --------------------------------------------------------

--
-- Table structure for table `jobinformer`
--

CREATE TABLE IF NOT EXISTS `jobinformer` (
  `informerid` int(5) NOT NULL auto_increment,
  `candidateid` int(5) NOT NULL,
  `informername` varchar(20) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `minexperience` int(3) default NULL,
  `maxexperience` int(3) default NULL,
  `minsalary` int(6) default NULL,
  `maxsalary` int(6) default NULL,
  `desirelocation` varchar(15) default NULL,
  `industryid` int(5) NOT NULL,
  `creationdate` date NOT NULL,
  PRIMARY KEY  (`informerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobinformer`
--

INSERT INTO `jobinformer` (`informerid`, `candidateid`, `informername`, `keyword`, `minexperience`, `maxexperience`, `minsalary`, `maxsalary`, `desirelocation`, `industryid`, `creationdate`) VALUES
(2, 56, 'abcd', 'PHP', 2, 5, 1000, 10000, 'abcdefgh', 1, '2017-02-20'),
(3, 56, 'ABCD', 'php', 0, 1, 1000, 2000, 'lllll', 1, '2017-02-20'),
(4, 56, 'abcd', 'ppp', 1, 3, 5000, 15000, 'Navsari', 1, '2017-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `adminid` int(5) NOT NULL auto_increment,
  `adminname` varchar(30) NOT NULL,
  `adminemail` varchar(50) NOT NULL,
  `adminpass` varchar(15) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `issuperadmin` int(1) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY  (`adminid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`adminid`, `adminname`, `adminemail`, `adminpass`, `departmentid`, `issuperadmin`, `status`) VALUES
(1, 'Jinal Tailor', 'admin@gmail.com', 'adminn', 0, 1, 'Active'),
(2, 'Saziya Saiyad', 'ss@gmail.com', '123456', 2, 0, 'Active'),
(6, 'abcd', 'abcd@gmail.com', '123456', 1, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tblcandidate`
--

CREATE TABLE IF NOT EXISTS `tblcandidate` (
  `candidateid` int(5) NOT NULL auto_increment,
  `candidateenrollno` bigint(15) default NULL,
  `candidatename` varchar(30) default NULL,
  `candidateimage` varchar(200) default NULL,
  `candidateemail` varchar(100) default NULL,
  `candidateadd` varchar(100) NOT NULL,
  `cityid` int(5) default NULL,
  `stateid` int(5) default NULL,
  `candidatemobile` bigint(15) default NULL,
  `candidatephone1` bigint(15) default NULL,
  `candidatepass` varchar(50) default NULL,
  `candidateskills` varchar(100) default NULL,
  `candidateresume` varchar(100) default NULL,
  `candidatedob` date default NULL,
  `candidategender` varchar(7) default NULL,
  `candidatelanguages` varchar(100) default NULL,
  `candidatepersonaldescription` varchar(1000) default NULL,
  `candidateregdate` date default NULL,
  `departmentid` int(5) default NULL,
  `candidatestatus` varchar(10) default NULL,
  `candidateremarks` varchar(50) default NULL,
  `candidateblockdate` date default NULL,
  `candidateblockby` varchar(20) default NULL,
  `facebook` varchar(50) default NULL,
  `twitter` varchar(50) default NULL,
  `googleplus` varchar(50) default NULL,
  `verificationcode` varchar(10) default NULL,
  `emailverified` varchar(1) default NULL,
  PRIMARY KEY  (`candidateid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tblcandidate`
--

INSERT INTO `tblcandidate` (`candidateid`, `candidateenrollno`, `candidatename`, `candidateimage`, `candidateemail`, `candidateadd`, `cityid`, `stateid`, `candidatemobile`, `candidatephone1`, `candidatepass`, `candidateskills`, `candidateresume`, `candidatedob`, `candidategender`, `candidatelanguages`, `candidatepersonaldescription`, `candidateregdate`, `departmentid`, `candidatestatus`, `candidateremarks`, `candidateblockdate`, `candidateblockby`, `facebook`, `twitter`, `googleplus`, `verificationcode`, `emailverified`) VALUES
(56, 155543693026, 'Pooja Mistry', 'hbibgvfbr5.jpg', 'pooja@gmail.com', '17, Vrindavan, Gandhinagar Socirty.', 3, 1, 9033656568, 123568963, '123456', 'PHP', 'abc.doc', '2017-01-24', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, '2017-01-09', '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '7653', 'Y'),
(57, 155543693027, 'Pratik Mistry', 'hbibgvfbr5.jpg', 'pratik@gmail.com', '17, Vrindavan, Gandhinagar Socirty.', 3, 1, 9033656568, 123568963, '123456', 'PHP', 'abc.doc', '2017-01-24', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 2, 'Active', NULL, '2017-01-09', '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(58, 155543693060, 'Ronak Patel', 'hgrbvibbf5.jpg', 'ronak@gmail.com', '102 Abcd Apt.', 6, 1, 9031286585, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Male', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(59, 155543693020, 'Megha Mistry', 'q2dffecs71.jpg', 'megha@gmail.com', 'bviuvhiu vivbiuv Apt.', 6, 1, 9031286585, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(60, 155543693022, 'Neha Patel', 'q2dffecs71.jpg', 'neha@gmail.com', 'bviuvhiu vivbiuv Apt.', 3, 1, 9031286585, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 2, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(61, 155543693089, 'Parth Kansara', 'ibg5rbbfhv.jpg', 'parth@gmail.com', 'bviuvhiu vivbiuv bvjvb.', 7, 1, 9031286585, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Male', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(62, 155543693089, 'Neha Panchal', 'ibg5rbbfhv.jpg', 'nehapanchal@gmail.com', 'bviuvhiu vivbiuv bvjvb.', 3, 1, 9031286585, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 2, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(63, 155543692998, 'Purvi Panchal', 'ibg5rbbfhv.jpg', 'purvi@gmail.com', 'bviuvhiu vivbiuv bvjvb.', 2, 1, 903125269, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(64, 155545258965, 'Tanvi Sharma', 'ibg5rbbfhv.jpg', 'tanvi@gmail.com', 'bviuvhiu vivbiuv bvjvb.', 3, 1, 903125269, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 2, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(65, 155545255235, 'Preeti Patel', 'ibg5rbbfhv.jpg', 'preeti@gmail.com', 'bviuvhiu vivbiuv bvjvb.', 6, 1, 903125269, 123568963, '123456', 'PHP,MySQL', 'abc.doc', '2017-01-04', 'Female', 'English,Hindi,Gujarati', 'nfehnf ejfnejf ejwngvewjv ewkjvbekj jjhjjjhiktj rtkhnrthkjhntkhntrh thrtnhjtkhrth trhjtnhtkrjhntrkhjrtk hrthntrkhnrt htohntrkhnkh nthntrh trohnth', '2017-01-05', 1, 'Active', NULL, NULL, '', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.facebook.com/', '2935', NULL),
(66, 25623569658, 'kp patel', 'qhr4tpar7f.png', 'test@gmail.com', 'jkfbkjfbkjvb', 2, 1, 4568975236, 5555555555, 'MTIzNDU2', 'Java', NULL, '2017-02-03', 'Female', NULL, NULL, '2017-02-06', 1, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, '2935', NULL),
(67, 13212313, 'test', 'ud9lo1c4d5.png', 't@gmail.com', 'vkjbvkjbvkjea', 2, 1, 7539518526, 4567894562, 'MTIzNDU2', 'JAVA', '', '2017-02-22', 'Male', 'English', 'vhjvfjf', '2017-02-09', 1, 'Pending', NULL, NULL, NULL, 'http://facebook.com', 'http://fb.com', 'https://www.facebook.com/', '2935', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcandidategraduation`
--

CREATE TABLE IF NOT EXISTS `tblcandidategraduation` (
  `candgradid` int(5) NOT NULL auto_increment,
  `graduationid` int(5) NOT NULL,
  `gradspecid` int(5) default NULL,
  `candidateid` int(5) NOT NULL,
  `universityid` int(5) NOT NULL,
  `passingyear` int(4) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY  (`candgradid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tblcandidategraduation`
--

INSERT INTO `tblcandidategraduation` (`candgradid`, `graduationid`, `gradspecid`, `candidateid`, `universityid`, `passingyear`, `grade`) VALUES
(1, 4, 3, 56, 4, 2015, 'AA'),
(3, 3, 1, 67, 1, 2011, 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `tblcandidatepostgrad`
--

CREATE TABLE IF NOT EXISTS `tblcandidatepostgrad` (
  `candpostid` int(5) NOT NULL auto_increment,
  `postgraduationid` int(5) NOT NULL,
  `postspecid` int(5) NOT NULL,
  `candidateid` int(5) NOT NULL,
  `universityid` int(5) NOT NULL,
  `passingyear` int(5) NOT NULL,
  `grade` varchar(20) NOT NULL,
  PRIMARY KEY  (`candpostid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblcandidatepostgrad`
--

INSERT INTO `tblcandidatepostgrad` (`candpostid`, `postgraduationid`, `postspecid`, `candidateid`, `universityid`, `passingyear`, `grade`) VALUES
(1, 1, 2, 56, 1, 2016, 'AA'),
(5, 6, 3, 67, 1, 2015, 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE IF NOT EXISTS `tblcity` (
  `cityid` int(5) NOT NULL auto_increment,
  `cityname` varchar(20) NOT NULL,
  `stateid` int(5) NOT NULL,
  `pincode` int(7) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`cityid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`cityid`, `cityname`, `stateid`, `pincode`, `delstatus`) VALUES
(2, 'Navsari', 1, 123456, 'N'),
(3, 'Bilimora', 1, 396321, 'N'),
(6, 'Valsad', 2, 965894, 'N'),
(7, 'Vadodara', 2, 589645, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tblcompany`
--

CREATE TABLE IF NOT EXISTS `tblcompany` (
  `companyid` int(5) NOT NULL auto_increment,
  `status` varchar(10) default NULL,
  `companyname` varchar(20) NOT NULL,
  `companylogo` varchar(150) default NULL,
  `companycontactno` bigint(15) NOT NULL,
  `companycontactperson` varchar(20) NOT NULL,
  `companyemail` varchar(100) NOT NULL,
  `companypass` varchar(15) NOT NULL,
  `companyaddress` varchar(100) NOT NULL,
  `companydescription` varchar(1000) NOT NULL,
  `companystate` varchar(20) NOT NULL,
  `companycity` varchar(20) NOT NULL,
  `companywebsite` varchar(50) NOT NULL,
  `facebook` varchar(50) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `googleplus` varchar(50) NOT NULL,
  `linkedin` varchar(50) default NULL,
  `verificationcode` varchar(10) default NULL,
  `emailverified` varchar(1) default NULL,
  PRIMARY KEY  (`companyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tblcompany`
--

INSERT INTO `tblcompany` (`companyid`, `status`, `companyname`, `companylogo`, `companycontactno`, `companycontactperson`, `companyemail`, `companypass`, `companyaddress`, `companydescription`, `companystate`, `companycity`, `companywebsite`, `facebook`, `twitter`, `googleplus`, `linkedin`, `verificationcode`, `emailverified`) VALUES
(1, 'Active', 'The Root Tech', 'skni00cfu3.png', 7567385389, 'Ronak Patel', 'ronakpatel@theroottech.com', 'ronakpatel', 'Station Road,\r\nBilimora.', 'We are a Gujarat, India based startup working with latest mobile and web technologies. We love our customers and go out of our way to build great product for them and create great experiences for them and their customer.\r\n\r\nWe believing in translating our customerâ€™s dream into a reality by giving life to their ideas.', '1', '3', 'http://theroottech.com/', '', '', '', NULL, '4450', 'Y'),
(2, 'Active', 'BlueStar Infotech', 'sif3ck0u0n.jpg', 7894561235, 'Mr. Bhatia', 'bluestar@gmail.com', 'bluestar', 'M.G. Road,\r\n', 'We provide fully customized and responsive e-commerce website which boost your sales with our beautifully designed e-commerce site.\r\n\r\n\r\nYour business is unique and your website should be as well. We will work with you to define your unique needs and create a website that accomplishes your objectives.\r\n\r\n\r\nEvery business wish to reach to its target market. Our SEO services enable every business to gain enhanced visibility with best marketing strategies by accomplishing their tailored requirements.', '1', '2', 'http://bluestar.com/', '', '', '', NULL, NULL, NULL),
(4, 'Active', 'L&T infotech', 'ce1unuc93s.png', 9586285286, 'A. M. Naik', 'lTinfotech@gmail.com', '123456789', 'N. H. 8 Navsari\r\n', 'Originally founded as L&T Information Technology Ltd (Read as L&T-IT), a completely owned subsidiary of Larsen & Toubro Ltd (L&T).[5] The company changed its name to L&T Infotech on 1 July 2001. Kameshwar Nagavarpu is a head and technology practises process.In December 2006, L&T Infotech acquired GDA Technologies (a privately held electronic design firm based in California, United States) and all of its design centres in India and USA. Sanjay Jalona[10] is the CEO & Managing Director at L&T Infotech.', '1', '2', 'https://www.lntinfotech.com/en-US/Pages/Home.aspx', '', '', '', NULL, NULL, NULL),
(5, 'Active', 'Mahindra Infotech', 'ns91cuue3c.png', 9586247895, 'K. K. Shah', 'info@mahindra.com', 'mahindra', 'Station Road , Vadodra', 'In 2014, Mahindra featured on the Forbes Global 2000, a comprehensive listing of the worldâ€™s largest, most powerful public companies, as measured by revenue, profit, assets and market value. The Mahindra Group also received the Financial Times â€˜Boldness in Businessâ€™ Award in the â€˜Emerging Marketsâ€™ category in 2013.', '1', '7', 'http://www.techmahindra.com', '', '', '', NULL, NULL, NULL),
(8, 'Pending', 'abcd', '1982356_752481091443181_911702761_n.jpg', 1234567895, 'pqrs', 'abcd@gmail.com', '123456789', 'bcjkdbck', 'hfniuh feihhhhhhhhiu', '', '2', 'http://abcd.com', '', '', '', NULL, NULL, NULL),
(9, 'Applied', 'testing', 'uo1nnm2tf9.png', 4568978569, 'test', 'abcd@gmail.com', '123456', 'vnoiiviknnn', 'vlvkvnvvnvknv vjknvknvkj', '1', '2', 'http://abcd.com', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE IF NOT EXISTS `tbldepartment` (
  `departmentid` int(5) NOT NULL auto_increment,
  `departmentname` varchar(10) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`departmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`departmentid`, `departmentname`, `delstatus`) VALUES
(1, 'MBA', 'N'),
(2, 'MCA', 'N'),
(3, 'Bsc', 'Y'),
(4, 'Bsc.', 'Y'),
(5, 'BSC', 'N'),
(6, 'Eng', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbldesignation`
--

CREATE TABLE IF NOT EXISTS `tbldesignation` (
  `designationid` int(5) NOT NULL auto_increment,
  `designationname` varchar(50) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`designationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbldesignation`
--

INSERT INTO `tbldesignation` (`designationid`, `designationname`, `delstatus`) VALUES
(1, 'JuniorAssistant', 'N'),
(2, 'Senio Assistant', 'Y'),
(3, 'testing', 'Y'),
(4, 'Senior Assistant', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tblgraduation`
--

CREATE TABLE IF NOT EXISTS `tblgraduation` (
  `graduationid` int(5) NOT NULL auto_increment,
  `graduationname` varchar(7) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`graduationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblgraduation`
--

INSERT INTO `tblgraduation` (`graduationid`, `graduationname`, `delstatus`) VALUES
(2, 'B.COM', 'N'),
(3, 'BSc', 'N'),
(4, 'BCA', 'N'),
(5, '', 'Y'),
(6, 'ABC', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblgraduationspecialization`
--

CREATE TABLE IF NOT EXISTS `tblgraduationspecialization` (
  `gradspecid` int(5) NOT NULL auto_increment,
  `gradspecname` varchar(30) NOT NULL,
  `graduationid` int(5) default NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`gradspecid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tblgraduationspecialization`
--

INSERT INTO `tblgraduationspecialization` (`gradspecid`, `gradspecname`, `graduationid`, `delstatus`) VALUES
(1, 'Physics', 3, 'N'),
(2, 'Chemistry', 3, 'N'),
(3, 'ABCD', 4, 'N'),
(4, 'abcd', 3, 'Y'),
(5, 'testing', 2, 'Y'),
(6, 'ABCDE', 2, 'N'),
(7, 'nvorlkvnrlv', 2, 'Y'),
(8, 'test', 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblindustry`
--

CREATE TABLE IF NOT EXISTS `tblindustry` (
  `industryid` int(5) NOT NULL auto_increment,
  `industryname` varchar(100) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`industryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblindustry`
--

INSERT INTO `tblindustry` (`industryid`, `industryname`, `delstatus`) VALUES
(1, 'Software', 'N'),
(2, 'Hardware', 'N'),
(3, 'Chemical', 'Y'),
(4, 'Chemical', 'Y'),
(5, 'testing', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblinterview`
--

CREATE TABLE IF NOT EXISTS `tblinterview` (
  `interviewid` int(5) NOT NULL auto_increment,
  `jobid` int(5) NOT NULL,
  `interviewlocation` varchar(100) NOT NULL,
  `interviewdate` date NOT NULL,
  `interviewtime` varchar(10) NOT NULL,
  `status` varchar(10) default NULL,
  `approvedby` varchar(20) default NULL,
  `approveddate` date default NULL,
  PRIMARY KEY  (`interviewid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tblinterview`
--

INSERT INTO `tblinterview` (`interviewid`, `jobid`, `interviewlocation`, `interviewdate`, `interviewtime`, `status`, `approvedby`, `approveddate`) VALUES
(1, 7, 'Navsari', '2017-02-28', '11 AM', 'Approved', NULL, NULL),
(2, 13, 'Navsari', '2017-02-28', '11 AM', 'Approved', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinterviewcandidate`
--

CREATE TABLE IF NOT EXISTS `tblinterviewcandidate` (
  `interviewcandidateid` int(5) NOT NULL auto_increment,
  `interviewid` int(5) NOT NULL,
  `interviewroundid` int(5) NOT NULL,
  `candidateid` int(5) NOT NULL,
  `marks` int(3) default NULL,
  PRIMARY KEY  (`interviewcandidateid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tblinterviewcandidate`
--

INSERT INTO `tblinterviewcandidate` (`interviewcandidateid`, `interviewid`, `interviewroundid`, `candidateid`, `marks`) VALUES
(1, 1, 1, 56, 40),
(2, 1, 2, 56, 80),
(3, 1, 1, 57, 80);

-- --------------------------------------------------------

--
-- Table structure for table `tbljob`
--

CREATE TABLE IF NOT EXISTS `tbljob` (
  `jobid` int(5) NOT NULL auto_increment,
  `jobname` varchar(20) NOT NULL,
  `jobdescription` varchar(1000) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `jobreqskill` varchar(50) NOT NULL,
  `jobqualification` varchar(10) NOT NULL,
  `jobminexp` int(5) NOT NULL,
  `jobmaxexp` int(5) NOT NULL,
  `jobminsalary` int(5) NOT NULL,
  `jobmaxsalary` int(5) NOT NULL,
  `jobpostdate` date NOT NULL,
  `joblocation` varchar(20) NOT NULL,
  `jobtype` varchar(10) NOT NULL,
  `jobstatus` varchar(10) default NULL,
  `delstatus` varchar(1) NOT NULL,
  `companyid` int(5) NOT NULL,
  `departmentid` int(5) NOT NULL,
  `industryid` int(5) NOT NULL,
  PRIMARY KEY  (`jobid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbljob`
--

INSERT INTO `tbljob` (`jobid`, `jobname`, `jobdescription`, `designation`, `jobreqskill`, `jobqualification`, `jobminexp`, `jobmaxexp`, `jobminsalary`, `jobmaxsalary`, `jobpostdate`, `joblocation`, `jobtype`, `jobstatus`, `delstatus`, `companyid`, `departmentid`, `industryid`) VALUES
(6, 'Web Developer', 'Need a Web Developer able to work in a innovative environment and can display his/her web skills .', '1', 'PHP , Wordpress', 'MCA', 0, 0, 10000, 15000, '2016-09-13', 'Bilimora', 'FullTime', 'Active', 'N', 1, 1, 1),
(7, 'Web Designer', 'Need a designer who is able to design attractive website.Need a designer who is able to design attractive website.Need a designer who is able to design attractive website.Need a designer who is able to design attractive website.Need a designer who is able to design attractive website.Need a designer who is able to design attractive website.', '4', 'Wrdpress , Photoshop', 'BCA', 0, 0, 10000, 15000, '2016-09-13', 'Navsari', 'PartTime', 'Active', 'N', 2, 2, 2),
(8, 'Graphics Designer', 'Need a designer who is able to design attractive wepages', '1', 'Wordpress , Joomla', 'MCA', 0, 0, 10000, 15000, '2016-09-13', 'Bilimora', 'FullTime', 'Complete', 'N', 4, 2, 1),
(9, 'Salesperson', 'An individual who sells goods and services to other entities. The successfulness of a salesperson is usually measured by the amount of sales he or she is able to make during a given period and how good that person is in persuading individuals to make a purchase. If a salesperson is employed by a company, in some cases compensation can be decreased or increased based on the amount of goods or services sold.', '1', 'Communication , Management', 'MBA', 0, 0, 10000, 15000, '2016-09-27', 'Navsari', 'PartTime', 'Active', 'N', 6, 1, 2),
(10, 'Team Leader', 'A team leader is someone who provides guidance, instruction, direction and leadership to a group of other individuals (the team) for the purpose of achieving a key result or group of aligned results. The team leader reports to a project manager ', '1', 'PHP, C, C++, oracle', 'MCA', 1, 3, 10000, 20000, '2016-09-27', 'Bilimora', 'FullTime', 'Complete', 'N', 2, 2, 1),
(11, 'Web Developer', 'Web developers are found working in various types of organizations, including large corporations and governments, small and medium - sized companies, or alone as freelancers. Some web developers work for one organization as a permanent full-time employee, while others may work as independent consultants, or as contractors for an employment agency. Web developers typically handle both server-side and front-end logic.', '1', 'PHP, ASP.NET', 'MCA', 2, 3, 15000, 25000, '2016-09-27', 'Vadodra', 'FullTime', 'Active', 'N', 4, 1, 2),
(12, 'Software Engineer', 'Software engineering is the application of engineering to the design, development, implementation, testing and maintenance of software in a systematic method.', '1', 'PHP , Wordpress , .Net , Oracle ', 'MCA', 1, 3, 10000, 15000, '2016-09-27', 'Navsari', 'PartTime', 'Active', 'N', 4, 2, 1),
(13, 'Unix Admin', 'As a trusted systems integrator for more than 50 years, General Dynamics Information Technology provides information technology (IT), systems engineering, professional services and simulation and training to customers in the defense, federal civilian government, health, homeland security, intelligence, state and local government and commercial sectors', '1', 'Unix', 'MCA', 2, 5, 15000, 25000, '2016-09-27', 'vadodara', 'FullTime', 'Active', 'N', 5, 2, 2),
(14, 'test', 'nbkdgnbdklb', '1', 'PHP', 'MCA', 0, 1, 10000, 12000, '2017-01-18', 'Bilimora', 'FullTime', 'Complete', 'N', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobalert`
--

CREATE TABLE IF NOT EXISTS `tbljobalert` (
  `jobalertid` int(5) NOT NULL auto_increment,
  `candidateid` int(5) NOT NULL,
  `alertname` varchar(100) NOT NULL,
  `skill` varchar(100) NOT NULL,
  `minsalary` int(5) NOT NULL,
  `maxsalary` int(5) NOT NULL,
  `industryid` int(5) NOT NULL,
  `createdate` date NOT NULL,
  PRIMARY KEY  (`jobalertid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbljobapply`
--

CREATE TABLE IF NOT EXISTS `tbljobapply` (
  `jobapplyid` int(5) NOT NULL auto_increment,
  `jobid` int(5) NOT NULL,
  `candidateid` int(5) NOT NULL,
  `applicationdate` date NOT NULL,
  `applicationstatus` varchar(12) NOT NULL,
  `approvedby` varchar(25) default NULL,
  `approveddate` date default NULL,
  `hireddate` date default NULL,
  `salarypackage` bigint(20) default NULL,
  PRIMARY KEY  (`jobapplyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `tbljobapply`
--

INSERT INTO `tbljobapply` (`jobapplyid`, `jobid`, `candidateid`, `applicationdate`, `applicationstatus`, `approvedby`, `approveddate`, `hireddate`, `salarypackage`) VALUES
(6, 6, 2, '2016-09-13', 'Interviewed', 'The Root Tech', '2016-09-23', NULL, NULL),
(10, 8, 1, '2016-09-18', 'Interviewed', 'The Root Tech', '2016-09-23', NULL, NULL),
(15, 7, 2, '2016-10-04', 'Interviewed', 'BlueStar Infotech', '2016-10-04', NULL, NULL),
(16, 6, 4, '2016-10-05', 'Interviewed', 'Saziya Saiyad', '2016-10-05', NULL, NULL),
(17, 12, 1, '2016-10-05', 'Interviewed', 'Saziya Saiyad', '2016-10-05', NULL, NULL),
(18, 13, 4, '2016-10-05', 'Interviewed', 'Saziya Saiyad', '2016-10-11', NULL, NULL),
(29, 7, 56, '2017-02-17', 'Hired', NULL, NULL, '2017-03-12', 10000),
(30, 7, 57, '2017-02-17', 'Interviewed', NULL, NULL, '2017-03-23', NULL),
(32, 13, 56, '2017-02-17', 'Hired', NULL, NULL, '2017-03-12', 10000),
(33, 6, 60, '2017-02-20', 'Hired', NULL, NULL, '2018-05-17', NULL),
(34, 11, 56, '2017-03-11', 'Hired', NULL, NULL, '2017-03-12', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbljobinvite`
--

CREATE TABLE IF NOT EXISTS `tbljobinvite` (
  `jobinviteid` int(5) NOT NULL auto_increment,
  `jobid` int(5) NOT NULL,
  `companyid` int(5) default NULL,
  `candidateid` int(5) default NULL,
  `invitedate` date NOT NULL,
  `invitestatus` varchar(15) NOT NULL,
  `approvedby` varchar(30) default NULL,
  `approveddate` date default NULL,
  PRIMARY KEY  (`jobinviteid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbljobinvite`
--

INSERT INTO `tbljobinvite` (`jobinviteid`, `jobid`, `companyid`, `candidateid`, `invitedate`, `invitestatus`, `approvedby`, `approveddate`) VALUES
(1, 6, 1, 63, '2017-03-12', 'Invited', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblnotification`
--

CREATE TABLE IF NOT EXISTS `tblnotification` (
  `notificationid` int(5) NOT NULL auto_increment,
  `candidateid` int(5) NOT NULL,
  `message` varchar(150) NOT NULL,
  `pageurl` varchar(100) NOT NULL,
  `notificationdate` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`notificationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblpostgradspecialization`
--

CREATE TABLE IF NOT EXISTS `tblpostgradspecialization` (
  `postspecid` int(5) NOT NULL auto_increment,
  `postspecname` varchar(30) NOT NULL,
  `postgraduationid` int(5) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`postspecid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tblpostgradspecialization`
--

INSERT INTO `tblpostgradspecialization` (`postspecid`, `postspecname`, `postgraduationid`, `delstatus`) VALUES
(1, 'finance', 1, 'N'),
(2, 'Animationjkbkbk', 1, 'Y'),
(3, 'physics', 6, 'N'),
(4, 'testing', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tblpostgraduation`
--

CREATE TABLE IF NOT EXISTS `tblpostgraduation` (
  `postgraduationid` int(5) NOT NULL auto_increment,
  `postgraduationname` varchar(10) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`postgraduationid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tblpostgraduation`
--

INSERT INTO `tblpostgraduation` (`postgraduationid`, `postgraduationname`, `delstatus`) VALUES
(1, 'MCA', 'N'),
(3, 'MBA', 'N'),
(4, 'MCA', 'Y'),
(5, 'MCA', 'Y'),
(6, 'MSc', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tblrecentvisitors`
--

CREATE TABLE IF NOT EXISTS `tblrecentvisitors` (
  `recentvisitorsid` int(5) NOT NULL auto_increment,
  `candidateid` int(5) NOT NULL,
  `companyid` int(5) NOT NULL,
  `visitdate` date NOT NULL,
  PRIMARY KEY  (`recentvisitorsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblsavejobs`
--

CREATE TABLE IF NOT EXISTS `tblsavejobs` (
  `savejobid` int(5) NOT NULL auto_increment,
  `companyid` int(5) NOT NULL,
  `candidateid` int(5) NOT NULL,
  `jobid` int(5) NOT NULL,
  `savedate` date NOT NULL,
  PRIMARY KEY  (`savejobid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE IF NOT EXISTS `tblstate` (
  `stateid` int(5) NOT NULL auto_increment,
  `statename` varchar(20) NOT NULL,
  PRIMARY KEY  (`stateid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`stateid`, `statename`) VALUES
(1, 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `tbluniversity`
--

CREATE TABLE IF NOT EXISTS `tbluniversity` (
  `universityid` int(5) NOT NULL auto_increment,
  `universityname` varchar(50) NOT NULL,
  `delstatus` varchar(1) NOT NULL,
  PRIMARY KEY  (`universityid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbluniversity`
--

INSERT INTO `tbluniversity` (`universityid`, `universityname`, `delstatus`) VALUES
(1, 'GTU', 'N'),
(3, 'utu', 'Y'),
(4, 'VNSGU', 'N'),
(5, 'Parul', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

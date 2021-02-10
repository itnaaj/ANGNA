-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 03:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angnadbfornaaz`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_donor`
--

CREATE TABLE `blood_donor` (
  `donor_id` int(11) NOT NULL,
  `donor_angnauid` varchar(100) NOT NULL,
  `donor_name` varchar(100) NOT NULL,
  `donor_dob` varchar(30) NOT NULL,
  `donor_gender` varchar(10) NOT NULL,
  `donor_phone` varchar(20) NOT NULL,
  `donor_email` varchar(100) NOT NULL,
  `donor_bg` varchar(100) NOT NULL,
  `donor_street` varchar(100) NOT NULL,
  `donor_ed` varchar(10) NOT NULL,
  `donor_ldd` varchar(50) DEFAULT NULL,
  `donor_ts` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `donor_dist` varchar(100) NOT NULL,
  `donor_state` varchar(100) NOT NULL,
  `shortnote` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(100) NOT NULL,
  `com_feed_id` varchar(1000) NOT NULL,
  `com_user_id` varchar(1000) NOT NULL,
  `com_data` varchar(1000) NOT NULL,
  `com_time` varchar(50) NOT NULL,
  `com_date` varchar(50) NOT NULL,
  `com_remark` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `contest_id` int(100) NOT NULL,
  `contest_name` varchar(400) NOT NULL,
  `contest_1st` varchar(100) NOT NULL,
  `contest_2nd` varchar(100) NOT NULL,
  `contest_tag` varchar(100) NOT NULL,
  `contest_total` varchar(10) NOT NULL,
  `contest_fee` varchar(10) NOT NULL,
  `contest_lastdate` varchar(20) NOT NULL,
  `contest_img` varchar(100) NOT NULL,
  `contest_tc` varchar(5000) NOT NULL,
  `contest_tc_icon` varchar(50) NOT NULL,
  `org_id` int(100) NOT NULL,
  `org_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contestpart`
--

CREATE TABLE `contestpart` (
  `part_id` int(100) NOT NULL,
  `part_contest_id` varchar(100) NOT NULL,
  `part_name` varchar(100) NOT NULL,
  `part_class` varchar(100) NOT NULL,
  `part_roll` varchar(100) NOT NULL,
  `part_email` varchar(100) NOT NULL,
  `part_phone` varchar(15) NOT NULL,
  `part_amount` varchar(100) NOT NULL,
  `part_curr` varchar(100) NOT NULL,
  `part_paystatus` varchar(10) NOT NULL,
  `part_payid` varchar(100) NOT NULL,
  `part_file` varchar(100) NOT NULL,
  `ex_2` varchar(500) NOT NULL,
  `ex_3` varchar(500) NOT NULL,
  `ex_4` varchar(500) NOT NULL,
  `part_group` varchar(100) NOT NULL,
  `part_dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contestreel`
--

CREATE TABLE `contestreel` (
  `reel_id` int(11) NOT NULL,
  `reelimg` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `custompay`
--

CREATE TABLE `custompay` (
  `cus_id` int(100) NOT NULL,
  `cus_acc_name` varchar(100) NOT NULL,
  `cus_acc` varchar(100) NOT NULL,
  `cus_ifsc` varchar(100) NOT NULL,
  `cus_upi` varchar(100) NOT NULL,
  `cus_paytm` varchar(100) NOT NULL,
  `cus_qr` varchar(100) NOT NULL,
  `cus_ppay` varchar(100) NOT NULL,
  `cus_gpay` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `custompay`
--

INSERT INTO `custompay` (`cus_id`, `cus_acc_name`, `cus_acc`, `cus_ifsc`, `cus_upi`, `cus_paytm`, `cus_qr`, `cus_ppay`, `cus_gpay`) VALUES
(1, 'FINCARE Small Finance Bank', '19100014729222', 'FSFB0000001', 'jnvangna@okaxis', '+91 7870593402', 'upi.jpg', '+91 7870593402', '+91 7870593402');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donate_id` int(255) NOT NULL,
  `donate_name` varchar(100) NOT NULL,
  `donate_email` varchar(100) NOT NULL,
  `donate_phone` varchar(20) NOT NULL,
  `donate_amount` varchar(1000) NOT NULL,
  `donate_curr` varchar(1000) NOT NULL,
  `mojo_id` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(100) NOT NULL,
  `event_type` varchar(20) NOT NULL,
  `event_guest` varchar(100) NOT NULL,
  `event_topic` varchar(100) NOT NULL,
  `event_date` varchar(20) NOT NULL,
  `event_time` varchar(20) NOT NULL,
  `event_des` varchar(400) NOT NULL,
  `event_img` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_type`, `event_guest`, `event_topic`, `event_date`, `event_time`, `event_des`, `event_img`) VALUES
(7, 'lc', 'CA Saurabh Singh', 'CA as a Career.', '2020-06-21', '07:00', 'https://www.facebook.com/100002492325553/videos/3039764036116644/', '7.jpg'),
(1, 'lc', 'Chanchala Kumari', 'Way to JPSC', '2020-05-10', '07:00', 'https://www.facebook.com/100003223098919/videos/2889661431151265/', '1.jpg'),
(2, 'lc', 'Mr. MN Vikash', 'Career in Aviation Industries', '2020-05-17', '07:00', 'https://www.facebook.com/100000604982577/videos/3628987147131416/', '2.jpg'),
(3, 'lc', 'Mrs Santoshi Kumari', 'Yoga as a career', '2020-05-24', '07:00', 'https://www.facebook.com/100003799142434/videos/1910546405748646/', '3.jpg'),
(4, 'lc', 'Mr.  Ravi Ranjan Pandey', 'How to crack JEE and competitive examination', '2020-05-31', '07:00', 'https://www.facebook.com/100002081725084/videos/3332959646783393/', '4.jpg'),
(5, 'lp', 'Mr Neeraj Singh', 'Career in Music Industry', '2020-06-07', '07:00', 'https://www.facebook.com/100036046385056/videos/261834821694729/', '5.jpg'),
(6, 'lc', 'Dr. Bibhusita Pani', 'How to make careeer in Scientific Research', '2020-06-14', '07:00', 'https://www.facebook.com/630392018/videos/10157077845282019/', '6.jpg'),
(8, 'lc', 'Mr. Vikash Dagar', 'Sports as a Career', '2020-06-28', '07:00', 'https://www.facebook.com/100001463790593/videos/3192368327488596/', '8.jpg'),
(9, 'lc', 'Mr Asharam Choudhary', 'Gurumantra to clear NEET exam', '2020-06-05', '07:00', 'https://www.facebook.com/100009674500805/videos/1379087279090409/', '9.jpg'),
(10, 'lp', 'RJ Anannd Raaj', 'RJ as a career cum Storytelling.', '2020-07-12', '12:07', 'https://www.facebook.com/100003309699061/videos/3092466054207021/', '10.jpg'),
(11, 'lc', 'Mr. Khursid Ansari', ' way to IIT and IT industry.', '2020-07-19', '07:00', 'https://www.facebook.com/1727799878/videos/10207607062491127/', '11.jpg'),
(12, 'lc', 'Mr. Harish Thanki', ' How not to get distracted after failure and start', '2020-08-02', '07:00', 'https://www.facebook.com/1143656528/videos/10223504235811053/', '12.jpg'),
(13, 'lp', 'Hari Shankar Prasad Singh ', 'Traditional Bhojpuri Lokgeet,  Bollywood songs and', '2020-08-09', '07:00', 'https://www.facebook.com/100011100906876/videos/1167477710298915/', '13.jpg'),
(14, 'lc', 'CA Shiv Shankar Vijaya and CA/CS Soma Gupta', 'All about investment in INDIA', '2020-08-16', '07:00', 'https://www.facebook.com/100002518545990/videos/3239474326146487/', '14.jpg'),
(15, 'lc', 'Mr. Ravi Bhushan Bhartiya', 'Career in Bollywood as an Actor', '2020-08-23', '07:00', 'https://www.facebook.com/1026413520/videos/10221518372401801/', '15.jpg'),
(16, 'lc', 'Mr. Avid Ali', 'Career in linguistics and foreign language.', '2020-08-30', '07:00', 'https://www.facebook.com/100006804164061/videos/2771548349748610/', '16.jpg'),
(17, 'lc', 'Mr. Prabhat Kumar Ravi', ' Career Opportunities after B-Tech and Current Job', '2020-09-06', '07:00', 'https://www.facebook.com/100001565237886/videos/3524262614302545/', '17.jpg'),
(18, 'ls', 'Dr. Praveen Cheripalli', 'COVID-19 Updates', '2020-09-13', '07:00', 'https://www.facebook.com/100002052178851/videos/3349356691809370/', '18.jpg'),
(19, 'lp', 'ANGNA VIRTUAL MEET', 'VMEET-2020', '2020-11-08', '09:00', 'https://www.facebook.com/jnvg.angna.5/videos/384736419541530', '19.jpg'),
(20, 'lc', 'Mr Ashutosh Kumar', 'Cyber Security Awareness and Introduction to ethical Hacking', '2020-11-29', '06:00', 'https://www.facebook.com/jnvg.angna.5/videos/400780301270475', '20.jpg'),
(21, 'lc', 'Dr. Prakash Vishwakarma', 'Enterpreneurship and How to handle dificult situation in life', '2020-12-06', '06:00', 'https://www.facebook.com/jnvg.angna.5/videos/405515880796917', '21.jpg'),
(22, 'lc', 'Dr. Kalicharan Patra', 'Demystifying the Brain', '2020-12-20', '06:00', 'https://www.facebook.com/jnvg.angna.5/videos/414509109897594', '22.jpg'),
(23, 'lc', 'MR. Vimal Pathak', 'How to make career in Travel and Tourism', '2020-12-27', '06:00', 'https://www.facebook.com/jnvg.angna.5/videos/418726776142494', '23.jpg'),
(24, 'lc', 'Mr. Pankaj Kumar Verma', 'Agriculture as a buisness', '2021-01-03', '06:00', 'https://www.facebook.com/jnvg.angna.5/videos/423049725710199', '24.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(100) NOT NULL,
  `feedback_user` varchar(100) NOT NULL,
  `feedback_email` varchar(100) NOT NULL,
  `feedback_data` varchar(2000) NOT NULL,
  `feedback_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedlikes`
--

CREATE TABLE `feedlikes` (
  `like_id` int(100) NOT NULL,
  `like_feed_id` varchar(100) NOT NULL,
  `like_user_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE `feeds` (
  `feed_id` int(100) NOT NULL,
  `feed_uploader_id` varchar(100) NOT NULL,
  `feed_upload_time` varchar(40) NOT NULL,
  `feed_topic` varchar(100) NOT NULL,
  `feed_data` varchar(9000) NOT NULL,
  `feed_like` varchar(50) NOT NULL,
  `feed_dislike` varchar(50) NOT NULL,
  `feed_image` varchar(100) NOT NULL,
  `feed_remark` varchar(100) NOT NULL,
  `feed_upload_date` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `benifited_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `follower_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgetpass`
--

CREATE TABLE `forgetpass` (
  `pass_id` int(100) NOT NULL,
  `pass_email` varchar(100) NOT NULL,
  `pass_otp` varchar(50) NOT NULL,
  `pass_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(100) NOT NULL,
  `gallery_type` varchar(50) NOT NULL,
  `gallery_img` varchar(500) NOT NULL,
  `gallery_des` varchar(100) NOT NULL,
  `gallery_remark` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_type`, `gallery_img`, `gallery_des`, `gallery_remark`) VALUES
(8, 'school', '1_1.jpg', 'Academic', ''),
(9, 'school', '2_2.jpg', 'Joy of cultural Programm', ''),
(10, 'school', '3_3.jpg', 'Heaven', ''),
(11, 'school', '4_4.jpg', 'Assembly', ''),
(12, 'school', '5_5.jpg', 'Beauty of culture', ''),
(13, 'school', '6_6.jpg', 'games', ''),
(14, 'school', '7_7.jpg', 'Front view of haven', ''),
(15, 'school', '8_8.jpg', 'Tiny torchs', ''),
(16, 'school', '9_9.jpg', 'ANGNA VMEET 2020', ''),
(17, 'school', '10_10.jpg', 'ANGNA VMEET 2020', '');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_id` int(100) NOT NULL,
  `notice_data` varchar(800) NOT NULL,
  `notice_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `notice_img` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_id`, `notice_data`, `notice_date`, `notice_img`) VALUES
(14, 'Our student <b>Pragati Gupta</b>(2013-2018) has performed outstanding in <b>JEE MAINS & ADVANCE 2020.  </b><a class=\"blinking\" href=\"feeds.php#angnafeedid71\"><b>Read More</b></a>   ', '2020-10-06 11:22:21', NULL),
(13, '<b>ANGNA</b> official website is launched on October 5th, 2020. Special thanks to <b><a href=\"profile.php?user_id=44\">Mr. Ashutosh Kumar Diwedi.</b> </a> <a href=\"feeds.php#angnafeedid67\" class=\"blinking\"><b>Read More</b></a>', '2020-10-06 11:26:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(100) NOT NULL,
  `not_for_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_like_feedid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_gby_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `not_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `not_read` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organiser`
--

CREATE TABLE `organiser` (
  `org_id` int(100) NOT NULL,
  `org_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_dest` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_det` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_fb` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_insta` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_wapp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_yt` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_tw` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `org_dp` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orgshowreel`
--

CREATE TABLE `orgshowreel` (
  `id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `org_reel_img` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(100) NOT NULL,
  `team_name` varchar(30) NOT NULL,
  `team_role` varchar(100) NOT NULL,
  `team_facebook` varchar(100) NOT NULL,
  `team_wapp` varchar(100) NOT NULL,
  `team_twitter` varchar(100) NOT NULL,
  `team_call` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `team_cat` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `google_id` varchar(1000) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `phone_privacy` varchar(10) NOT NULL DEFAULT 'OM',
  `gender` varchar(10) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `iam` varchar(100) NOT NULL,
  `user_batch` varchar(100) NOT NULL,
  `badge` varchar(100) NOT NULL,
  `user_dp` varchar(1000) NOT NULL,
  `dp_c` varchar(10) NOT NULL,
  `verify` varchar(10) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `passout_year` varchar(11) NOT NULL,
  `jnv` varchar(100) NOT NULL,
  `add_street` varchar(200) NOT NULL,
  `add_city` varchar(100) NOT NULL,
  `add_state` varchar(100) NOT NULL,
  `shortnote` varchar(1000) NOT NULL,
  `follower` varchar(100) NOT NULL DEFAULT '0',
  `user_online_status` varchar(100) NOT NULL,
  `meet_prompt` varchar(11) NOT NULL DEFAULT 'NU'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_donor`
--
ALTER TABLE `blood_donor`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`contest_id`);

--
-- Indexes for table `contestpart`
--
ALTER TABLE `contestpart`
  ADD PRIMARY KEY (`part_id`);

--
-- Indexes for table `contestreel`
--
ALTER TABLE `contestreel`
  ADD PRIMARY KEY (`reel_id`);

--
-- Indexes for table `custompay`
--
ALTER TABLE `custompay`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donate_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `feedlikes`
--
ALTER TABLE `feedlikes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `feeds`
--
ALTER TABLE `feeds`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgetpass`
--
ALTER TABLE `forgetpass`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `organiser`
--
ALTER TABLE `organiser`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `orgshowreel`
--
ALTER TABLE `orgshowreel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `contest_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contestpart`
--
ALTER TABLE `contestpart`
  MODIFY `part_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `contestreel`
--
ALTER TABLE `contestreel`
  MODIFY `reel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `custompay`
--
ALTER TABLE `custompay`
  MODIFY `cus_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donate_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `feedlikes`
--
ALTER TABLE `feedlikes`
  MODIFY `like_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `feeds`
--
ALTER TABLE `feeds`
  MODIFY `feed_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `forgetpass`
--
ALTER TABLE `forgetpass`
  MODIFY `pass_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `notice_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `organiser`
--
ALTER TABLE `organiser`
  MODIFY `org_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orgshowreel`
--
ALTER TABLE `orgshowreel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

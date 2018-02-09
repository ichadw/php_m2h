-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2018 at 04:58 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hawks`
--

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `id_video` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `url_video` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channel`
--

INSERT INTO `channel` (`id_video`, `title`, `description`, `url_video`, `created_at`) VALUES
(2, 'Boston Celtics VS Atlanta Hawks', '<p>Boston Celtics vs Atlanta Hawks Full Game Highlight&nbsp;/ Week 4 / 2017 NBA Season</p>\r\n', 'https://www.youtube.com/embed/3DhKgHWSbuU', '2018-01-06 10:17:22'),
(3, 'Boston Celtics vs Brooklyn Nets - Full Game Highlights | November 14, 2017 | 2017-18 NBA Season', 'Boston Celtics vs Brooklyn Nets - Full Game Highlights | November 14, 2017 | 2017-18 NBA Season', 'https://www.youtube.com/embed/7v937gpqfpw', '2018-01-06 10:27:22'),
(4, 'San Antonio Spurs vs Dallas Mavericks - Full Game Highlights | Nov 14, 2017 | 2017-18 NBA Season', 'San Antonio Spurs vs Dallas Mavericks - Full Game Highlights | Nov 14, 2017 | 2017-18 NBA Season', 'https://www.youtube.com/embed/Aw4gkTj6qbY', '2018-01-06 05:37:22'),
(5, 'NBA Fights Trash Talking Ejections Flagrent Fouls in 2017-18 Season(Regular Season)', 'NBA Fights Trash Talking Ejections Flagrent Fouls in 2017-18 Season(Regular Season)part 1', 'https://www.youtube.com/embed/HG2ep4mKbyE', '2018-01-06 05:17:22'),
(6, 'NBA FIGHTS 2016-17 SEASON', 'NBA FIGHTS 2016-17 SEASON', 'https://www.youtube.com/embed/F8UzjApbsHo', '2018-01-04 10:37:22'),
(7, 'NBA Best Blocks of 2016-17 Season', 'NBA Best Blocks of 2016-17 Season', 'https://www.youtube.com/embed/kM78hErGmEo', '2018-01-03 10:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `id` int(11) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0',
  `groups` tinyint(1) NOT NULL DEFAULT '2',
  `address` varchar(500) DEFAULT NULL,
  `phone_numb` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`id`, `fname`, `lname`, `email`, `password`, `status`, `groups`, `address`, `phone_numb`) VALUES
(1, 'James', 'Arthur', 'floriana.sho@luminov.com', '21232f297a57a5a743894a0e4a801fc3', b'0', 2, NULL, NULL),
(4, 'Test', 'Test', 'test@test.com', '21232f297a57a5a743894a0e4a801fc3', b'0', 2, 'testestsetsetsetset', '085719589158');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(200) CHARACTER SET latin1 NOT NULL,
  `keywords` varchar(200) CHARACTER SET latin1 NOT NULL,
  `icon` varchar(100) CHARACTER SET latin1 NOT NULL,
  `author` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `title`, `description`, `keywords`, `icon`, `author`) VALUES
(1, 'Hawks-2 Methodist', 'asda asd asda a adsd', 'basketball', 'hawks_ico.png', 'Hawks');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `status` enum('unpaid','paid','cancelled','expired') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `date`, `due_date`, `status`) VALUES
(1, '2017-11-29 11:10:37', '2017-11-30 11:10:37', 'unpaid'),
(2, '2017-11-29 11:11:00', '2017-11-30 11:11:00', 'unpaid'),
(3, '2017-11-29 11:11:54', '2017-11-30 11:11:54', 'unpaid'),
(4, '2017-11-29 11:11:55', '2017-11-30 11:11:55', 'unpaid'),
(5, '2017-11-29 11:11:56', '2017-11-30 11:11:56', 'unpaid'),
(6, '2017-11-29 11:12:47', '2017-11-30 11:12:47', 'unpaid'),
(7, '2017-11-29 11:13:29', '2017-11-30 11:13:29', 'unpaid'),
(8, '2017-11-29 11:13:31', '2017-11-30 11:13:31', 'unpaid'),
(9, '2017-11-29 11:14:07', '2017-11-30 11:14:07', 'unpaid'),
(10, '2017-12-12 11:14:21', '2017-12-13 11:14:21', 'unpaid'),
(11, '2017-12-12 11:24:52', '2017-12-13 11:24:52', 'unpaid'),
(12, '2018-01-06 18:45:07', '2018-01-07 18:45:07', 'unpaid'),
(13, '2018-01-06 22:20:51', '2018-01-07 22:20:51', 'unpaid'),
(14, '2018-01-18 00:42:12', '2018-01-19 00:42:12', 'unpaid'),
(15, '2018-01-18 00:42:32', '2018-01-19 00:42:32', 'unpaid'),
(16, '2018-01-20 11:57:48', '2018-01-21 11:57:48', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `headline` int(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish` int(2) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `headline`, `title`, `content`, `slug`, `thumbnail`, `order`, `author`, `publish`, `timestamp`) VALUES
(1, 0, 0, 'Roster Lengkap dan Jadwal Pertandingan IBL Seri 1 2017-2018', '                                                <p>Indonesia Basketball League (IBL) 2017-2018 akan mulai bergulir akhir pekan ini. Sebanyak 10 tim profesional Indonesia akan bertarung di GOR Sahabat Semarang sebagai seri pembuka musim ini. Mereka akan dibagi menjadi dua Divisi seperti musim lalu, hanya saja ada beberapa perubahan komposisi tim.</p>\r\n\r\n<p>NSH Jakarta dan Hangtuah yang musim lalu ada di Divisi Putih, bergeser ke Divisi Merah. Ini agar Divisi Merah semakin seimbang karena hilangnya CLS Knights Surabaya. Sedangkan Siliwangi Bandung yang ada di Divisi Merah, pindah ke Divisi Putih. Berikut pembagian Divisi untuk IBL 2017-2018;</p>\r\n\r\n<p><img src="https://www.mainbasket.com/uploads/post/2017/12/04/DIVISI_MERAH-page-001.jpg" /></p>\r\n\r\n<p>Selain perubahan Divisi, beberapa tim juga menambahkan pemain baru. Bank BJB Garuda Bandung kini diperkuat oleh Raymond Shariputra. Lalu di Bima Perkasa Yogyakarta ada dua pemain yang muncul kembali di liga profesional yaitu Frida Aris dan Restu Dwi Purnomo. Frida absen selama dua musim k                                            ', 'roster-lengkap-dan-jadwal-pertandingan-ibl-seri-1-2017-2018', 'd561226e8b1be67cfa2b8b7e1c731e20.png', 0, 'Jaka', 1, '2017-09-01 00:00:00'),
(2, 0, 0, 'NYK 113, LAL 109: Porzingis Explodes for 37 as Knicks Knock Off Lakers in OT', '<p>How It Happened:\r\nA back-and-forth battle between two teams on opposite sides of the coast ensued on Tuesday night at MSG.  Deep into the fourth quarter, New York seemed to have snatched the momentum with a five-point advantage off a midrange bucket from Kristaps Porzingis.  Los Angeles answered back as Kentavious Caldwell-Pope finished a putback and then Kyle Kuzma hit a 3-pointer with 23.9 seconds on the game clock.  As the two squads entered the overtime session, head coach Jeff Hornacek utilized a lineup that was strong in the fourth frame.  Michael Beasley, Frank Ntilikina, and Doug McDermott joined Porzingis and Courtney Lee in the extra session.  Beasley connected on a tip-in prior to McDermott’s layup to give the home team a 107-103 cushion.  Brandon Ingram scored at the 1:05 mark but the deficit was too much to overcome in overtime and New York secured the 113-109 victory.\r\n\r\nKnick of the Night:\r\nThe home crowd was treated to another spectacular night from The Unicorn.  Porzingis poured in 37 points on 14-of-26 shooting and 5-of-8 from downtown.  He also grabbed 11 boards and swatted five shots to help lift New York to its 13th victory at Madison Square Garden this year.\r\n\r\nNotables:\r\nBeasley was clutch in the final two periods of play.  The forward scored 12 of his 13 in the fourth quarter and overtime session.  Ntilikina added seven in the fourth frame as part of a season-high 13 points.  McDermott added 10 and Enes Kanter finished with a double-double.\r\n\r\nStatistically Speaking:\r\nTonight’s contest featured 20 lead changes and 17 times it was tied.\r\n\r\nNext Up:\r\nThe Knicks will make the short trip to Brooklyn for a road contest against the Nets on Thursday night.  Watch all the action on MSG Network at 7:30 PM.\r\n</p>', 'nyk-113-lal-109-porzingis-explodes-for-37-as-knicks-knock-off-lakers-in-ot', '29031e1656cc53df83273fa2ed327281.png', 0, 'Armand', 1, '2017-08-16 00:00:00'),
(3, 0, 0, 'News 3', '                                                <p>ini berita ketiga. Lanjut? </p>                                            ', 'news-3', 'img3.png', 0, 'Excel', 1, '2017-09-03 00:00:00'),
(4, 0, 0, 'News 4', '<p> ini berita keempat. Lanjut?  </p>                                                    ', 'news-4', 'img4.png', 0, 'James', 1, '2017-08-16 00:00:00'),
(5, 0, 0, 'News 5', '                        <p> Ini berita kelima. Lanjut? </p>                      ', 'news-5', '551fcd3fcd53f06301e1b7afcf52047e.png', 0, 'Sendy', 1, '2012-05-16 00:00:00'),
(10, 0, 0, 'News123', ' <p>sadasd a sasdasd asd ad </p>\r\n                                                                  ', 'news123', 'cd4c5f961d73fb016841a02b4407855e.png', 0, 'Lia', 1, '2017-10-18 00:00:00'),
(11, 0, 0, 'Knicks and Nets Square Off in Brooklyns', '<p>1.&nbsp; The Knicks passed their first overtime test with flying colors by knocking off the Lakers 113-109 in their lone visit to MSG this year.&nbsp; Kristaps Porzingis was spectacular and the bench crew lifted New York in the extra session as the home team improved to 14-13 overall and 13-5 at home.&nbsp; The Knicks were efficient by shooting 47.5 percent from the floor and a sparkling 40.9 percent behind the arc in the win.&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>2.&nbsp; As mentioned above, Porzingis provided the home crowd with a thrilling performance on Tuesday evening.&nbsp; The 22-year old became the first player in NBA history to have at least 35 points, 10 rebounds, five blocks and five made 3-pointers in a game.&nbsp; He finished with a game-high 37 points, 11 rebounds, and five swats in 40 minutes of action.&nbsp; Currently, Porzingis is in the top ten in points per game in the NBA and No. 2 in blocked shots.</p>\r\n\r\n<p>3.&nbsp; Head coach Jeff Hornacek continues to tinker with his lineup and rotations due to the absence of Tim Hardaway Jr.&nbsp; The shooting guard is out with a stress injury to his lower left leg.&nbsp; Hornacek has started Lance Thomas at the small forward spot in place of Hardaway Jr.&nbsp; Thomas is providing defense and stability in the starting unit but the bench crew is becoming a production source for the orange and blue.&nbsp; The second unit combined for 44 points, 15 rebounds, and 10 assists.&nbsp; Michael Beasley was impactful in the final frame and overtime as he scored 12 points in those crucial periods.&nbsp;&nbsp;</p>\r\n\r\n<p>4.&nbsp; In the first meeting between the two teams, the Knicks gained separation in the middle of the contest by outscoring the Nets 60-38 in the second and third quarters.&nbsp; Porzingis delivered throughout the matchup with a game-high 30 points to go along with nine boards.&nbsp; New York dominated in two key areas in the 107-86 victory.&nbsp; The home team won the battle in the paint 50-26 and netted 31 second chance points as opposed to Brooklyn&rsquo;s six points.&nbsp; Kyle O&rsquo;Quinn played a major role for the bench unit as he hauled down 12 boards.&nbsp; Doug McDermott scored 12 and Frank Ntilikina dished out five dimes as part of the production off the pine.&nbsp;</p>\r\n\r\n<p>5.&nbsp; Brooklyn made a roster move last week by shipping Trevor Booker to the Sixers in exchange for former No. 3 overall pick Jahlil Okafor and Nik Stauskas.&nbsp; Both players have yet to play for the Nets.&nbsp; On Tuesday night, Brooklyn notched its third win in its last four outings by topping Washington 103-98.&nbsp; Seven players for Brooklyn recorded double figures while Rondae Hollis-Jefferson and Spencer Dinwiddie recorded double-doubles.&nbsp; Despite missing its leading scorer, D&rsquo;Angelo Russell, Brooklyn has remained in the top five in 3-point attempts and makes.&nbsp; The Nets are also a strong team on the glass, ranking No. 4 in the NBA in rebounds.</p>\r\n', 'knicks-and-nets-square-off-in-brooklyns', '42f2587d8cb47473afeb19635bd1ffb7.png', 0, 'admin', 1, '2017-12-18 14:49:26'),
(13, 0, 0, 'Knicks Aim to Remain Hot Against Hornets in Charlotte', '<p><strong>7:00 PM ET | Spectrum Center</strong><br />\r\n<strong>TV:&nbsp; MSG Network</strong><br />\r\n<strong>Radio: ESPN 98.7 FM</strong></p>\r\n\r\n<p>1.&nbsp; Emotions ran high on Saturday night at Madison Square Garden with the return of Carmelo Anthony for the first time since the offseason trade.&nbsp; The Knicks honored the 10-time All-Star by showcasing a tribute on GardenVision prior to the contest.&nbsp; After the opening tip, New York quickly showed Anthony and the Thunder it was not the team they met in the season opener.&nbsp; The Knicks put together a 27-18 second quarter, which led to a 50-44 advantage at the half.&nbsp; Down the stretch, the home team converted on key plays to hold Oklahoma City below the century mark while six players for the orange and blue reached double figures in scoring.&nbsp; Russell Westbrook managed to score 25 points but Anthony and Paul George were limited to a combined 30 points.&nbsp; The Knicks shot 55.1 percent from the floor and a scorching-hot 60.9 percent behind the arc.&nbsp; New York concluded the season series against Oklahoma City by capturing the exhilarating 111-96 win. &nbsp;</p>\r\n\r\n<p>2.&nbsp; New York&rsquo;s recent four-game surge moved the team to the sixth spot in the latest Eastern Conference standings.&nbsp; In fact, the Knicks (16-13) only trail Detroit and Indiana for the fourth position behind the Toronto Raptors.&nbsp; At the friendly confines of MSG, New York boasts a 14-5 mark, which is tied (San Antonio) for the best home record in the league.&nbsp; The Knicks rank in the top 15 in points per game, points allowed, rebounds per game, and top ten in assists.</p>\r\n\r\n<p>3.&nbsp; Kristaps Porzingis exited Brooklyn on Thursday night with a sore left knee.&nbsp; He did not return after departing in the third quarter and was inactive on Saturday night against Oklahoma City.&nbsp; The big man traveled with the team to Charlotte and will test his knee at shootaround while remaining a game time decision, per head coach Jeff Hornacek.&nbsp; New York is also missing Tim Hardaway Jr. with a stress injury to his lower left leg.&nbsp; The shooting guard is expected to be re-evaluated in the near future.&nbsp; &nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>4.&nbsp; Michael Beasley earned the starting nod in place of Porzingis on Saturday night and the power forward delivered a monster performance.&nbsp; In 38 minutes, Beasley tied a season-high with 30 points on 11-of-18 shooting from the floor to go along with two buckets from deep.&nbsp; The 28-year old enjoyed a nice all-around game as well by grabbing five boards, dishing out four assists, and swatting two shots.&nbsp; Doug McDermott also played a pivotal role on Saturday and is becoming a key contributor off the bench.&nbsp; Over his last five games, McDermott is averaging 13 points per game while shooting 55.1 percent from the perimeter and 47.1 percent from the arc.</p>\r\n\r\n<p>5.&nbsp; In the first meeting between the two teams, New York blasted past Charlotte in the fourth quarter by outscoring the road team 35-19 en route to a 118-113 victory.&nbsp; Since the November 7 contest at MSG, the Hornets are 5-13 and 10-19 overall heading into tonight&rsquo;s game.&nbsp; Charlotte has dropped its last two games to start a four-game homestand, including Saturday&rsquo;s narrow defeat to the Blazers.&nbsp; Kemba Walker continues to the lead the team from an offensive standpoint as he averages 21.9 points and six assists per game.&nbsp; Defensively, Dwight Howard controls the paint for the Hornets by averaging 12.7 boards and 1.3 blocks this season.</p>\r\n', 'knicks-aim-to-remain-hot-against-hornets-in-charlotte', '4fe9beba8a98c0cb09e068c7914e419f.png', 0, 'admin', 1, '2017-12-19 14:39:45'),
(15, 0, 1, 'Riding Three-Game Win Streak, Knicks Host Thunder in Melo’s Return to MSG', '<p><strong>7:30 PM ET | Madison Square Garden</strong><br />\r\n<strong>TV:&nbsp; MSG Network</strong><br />\r\n<strong>Radio: ESPN 98.7 FM</strong></p>\r\n\r\n<p>1.&nbsp; The Knicks blasted past Brooklyn in the final stages of Thursday&rsquo;s contest to notch their second road win of the season.&nbsp; After establishing a 13-point lead in the first half, New York surrendered the advantage in the third frame and Kristaps Porzingis left the game with a sore left knee.&nbsp; Courtney Lee and New York rallied back as the veteran guard tallied 18 points in the second half to help the road team secure the 111-104 win.&nbsp; Michael Beasley scored 11 points in the third quarter, Kyle O&rsquo;Quinn and Enes Kanter combined to grab 19 rebounds, and Frank Ntilikina dished out a team-high eight assists.&nbsp; With their third straight victory, the Knicks improved to 15-13 on the season and they currently sit in the eighth spot in the Eastern Conference standings. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>2.&nbsp; Porzingis did not return to game action after suffering the knee injury in Thursday&rsquo;s contest.&nbsp; Following the game, Porzingis told reporters he did not feel the injury was serious and he was hopeful to suit up against the Thunder on Saturday.&nbsp; He is averaging 25.5 points, 6.6 rebounds, and 2.1 blocks per game this year.&nbsp; The team has listed Porzingis as questionable for today&rsquo;s matchup against Oklahoma City.</p>\r\n\r\n<p>3.&nbsp; Carmelo Anthony will make his first appearance at Madison Square Garden since the offseason trade to the Thunder.&nbsp; In seven seasons with the Knicks, Anthony averaged 24.7 points and seven rebounds per game, reached the All-Star game seven times, won the scoring title in 2012-13, and set the MSG scoring record with 62 points.&nbsp; On the flip side of the deal, New York acquired Kanter and McDermott from Oklahoma City.&nbsp; Kanter has been welcomed with open arms by the fan base and he&rsquo;s delivered on and off the floor.&nbsp; In 25 games, the big man is averaging a double-double with 13.4 points and 10.3 rebounds.&nbsp; He has fit perfectly next to Porzingis as the two players have quickly become a force in the Knicks frontcourt.&nbsp; McDermott has provided a spark off the bench and not only with his sharpshooting from the perimeter.&nbsp; The 25-year old owns a myriad of highlight dunks this season and he&rsquo;s displayed a knack for scoring off of back-door opportunities.&nbsp;&nbsp;</p>\r\n\r\n<p>4.&nbsp; These two teams squared off in the season opener on October 20 in Oklahoma City.&nbsp; While New York kept it close in the first half, the Thunder pulled away in the third quarter and captured a double-digit victory.&nbsp; Porzingis posted 31 points and 12 rebounds while Russell Westbrook, Anthony, and Paul George combined for 71 points in the win.&nbsp;</p>\r\n\r\n<p>5.&nbsp; Since the opening night win, Oklahoma City (14-14) has struggled with consistency.&nbsp; After a loss to Charlotte, the Thunder bounced back to win their last two games, including a marathon contest in Philadelphia last night.&nbsp; Oklahoma City outlasted the Sixers in triple overtime with a 119-117 win.&nbsp; The core players for the Thunder logged significant time on the floor (Westbrook 52 minutes, Steven Adams 51, George 45, Anthony 47) and they complete a three-game east coast trip tonight in New York on the second of a back-to-back.&nbsp; A key stat to watch in this matchup is battle on the offensive glass.&nbsp; Both teams rank in the top ten in this category and in the top five in second chance points.</p>\r\n', 'riding-three-game-win-streak-knicks-host-thunder-in-melos-return-to-msg', '6a03de3bd0cf8b0b166dc4f02658e33a.png', 0, 'admin', 1, '2017-12-19 16:50:21'),
(16, 0, 0, 'NYK 111, OKC 96: Beasley Scores Season-High to Lift Knicks to Fourth Straight Win', '<p><strong>How It Happened:</strong><br />\r\nWithout Kristaps Porzingis in the lineup, the Knicks managed to control a majority of the contest in Carmelo Anthony&rsquo;s return to MSG.&nbsp; The home team found the offensive production from Michael Beasley and the home team was extremely efficient en route to its fourth straight victory.&nbsp; New York avenged the season opening defeat to the Thunder by holding Russell Westbrook relatively in-check with 25 points while Anthony and Paul George only combined for 30.&nbsp; The final quarter proved to be a pivotal as Oklahoma City attempted a comeback.&nbsp; Doug McDermott and company helped to stave off the Thunder by outscoring the road team 31-23 in that fourth period.&nbsp; New York improved to 16-13 overall and 14-5 at home this season.</p>\r\n\r\n<p><strong>Knick of the Night:</strong><br />\r\nBeasley tied a season-high with 30 points on 11-of-18 shooting from the floor to go along with five boards and four assists in 37 minutes of action.&nbsp;</p>\r\n\r\n<p><strong>Notables:</strong><br />\r\nMcDermott hit 3-of-5 from deep range (13 points), Courtney Lee finished with 20 points, Ron Baker added 11 off the bench, and Jarrett Jack grabbed eight rebounds and dished out seven dimes in the win.</p>\r\n\r\n<p><strong>Statistically Speaking:</strong><br />\r\nNew York was incredibly sharp on Saturday night.&nbsp; The orange and blue connected on 55.1 percent of its shots from the field, 60.9 percent from downtown, and 80.8 percent at the charity stripe.</p>\r\n\r\n<p><strong>News and Notes:</strong><br />\r\nPorzingis left Thursday&rsquo;s game in Brooklyn with a sore left knee.&nbsp; He did not suit up on Saturday and his status is unclear for Monday&rsquo;s game.</p>\r\n\r\n<p><strong>Next Up:</strong><br />\r\nThe Knicks will hit the road on Sunday afternoon to Charlotte and square off against the Hornets on Monday evening.&nbsp; Watch all the action on MSG Network at 7:00 pm.</p>\r\n', 'nyk-111-okc-96-beasley-scores-season-high-to-lift-knicks-to-fourth-straight-win', '824223c75f38cd0f09afaa1f05e47e25.png', 0, 'admin', 1, '2017-12-19 17:23:24'),
(19, 0, 0, 'National Basketball Association', '<p>The&nbsp;<strong>National Basketball Association</strong>&nbsp;(<strong>NBA</strong>) is a men&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Professional_basketball">professional basketball</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Sports_league">league</a>&nbsp;in&nbsp;<a href="https://en.wikipedia.org/wiki/North_America">North America</a>; composed of 30 teams (29 in the United States and 1 in Canada). It is widely considered to be the premier men&#39;s professional basketball league in the world. The NBA is an active member of&nbsp;<a href="https://en.wikipedia.org/wiki/USA_Basketball">USA Basketball</a>&nbsp;(USAB),<a href="https://en.wikipedia.org/wiki/National_Basketball_Association#cite_note-2">[2]</a>&nbsp;which is recognized by&nbsp;<a href="https://en.wikipedia.org/wiki/FIBA">FIBA</a>&nbsp;(also known as the International Basketball Federation) as the&nbsp;<a href="https://en.wikipedia.org/wiki/Sport_governing_body">national governing body</a>&nbsp;for basketball in the United States. The NBA is one of the four&nbsp;<a href="https://en.wikipedia.org/wiki/Major_professional_sports_leagues_in_the_United_States_and_Canada">major professional sports leagues in the United States and Canada</a>. NBA players are the world&#39;s best paid athletes by average annual salary per player.<a href="https://en.wikipedia.org/wiki/National_Basketball_Association#cite_note-3">[3]</a><a href="https://en.wikipedia.org/wiki/National_Basketball_Association#cite_note-4">[4]</a></p>\r\n\r\n<p>The league was founded in&nbsp;<a href="https://en.wikipedia.org/wiki/New_York_City">New York City</a>&nbsp;on June 6, 1946, as the&nbsp;<a href="https://en.wikipedia.org/wiki/Basketball_Association_of_America">Basketball Association of America</a>&nbsp;(BAA).<a href="https://en.wikipedia.org/wiki/National_Basketball_Association#cite_note-ANewLeagueNBA.com-1">[1]</a><a href="https://en.wikipedia.org/wiki/National_Basketball_Association#cite_note-5">[5]</a>&nbsp;The league adopted the name National Basketball Association on August 3, 1949, after merging with the competing&nbsp;<a href="https://en.wikipedia.org/wiki/National_Basketball_League_(United_States)">National Basketball League</a>&nbsp;(NBL). The league&#39;s several international as well as individual team offices are directed out of its head offices located in the&nbsp;<a href="https://en.wikipedia.org/wiki/Olympic_Tower">Olympic Tower</a>&nbsp;at 645&nbsp;<a href="https://en.wikipedia.org/wiki/Fifth_Avenue">Fifth Avenue</a>&nbsp;in&nbsp;<a href="https://en.wikipedia.org/wiki/Manhattan">New York, NY</a>.&nbsp;<a href="https://en.wikipedia.org/wiki/NBA_Entertainment">NBA Entertainment</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/NBA_TV">NBA TV</a>&nbsp;studios are directed out of offices located in&nbsp;<a href="https://en.wikipedia.org/wiki/Secaucus,_New_Jersey">Secaucus, New Jersey</a>.</p>\r\n', 'national-basketball-association', '0d4c20ac7bb2e56c87232ae7023deaba.png', 0, 'admin', 1, '2017-12-20 00:53:17');

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` int(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoices_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` int(9) NOT NULL,
  `options` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoices_id`, `product_id`, `product_name`, `qty`, `price`, `options`) VALUES
(1, 0, 1, 'Product 1', 1, 150000, ''),
(2, 0, 8, 'Product 8', 1, 150000, ''),
(3, 0, 1, 'Product 1', 1, 150000, ''),
(4, 0, 1, 'Product 1', 1, 150000, ''),
(5, 0, 1, 'Product 1', 5, 150000, ''),
(6, 0, 6, 'Product 6', 1, 20000, ''),
(7, 0, 1, 'Product 1', 1, 150000, ''),
(8, 0, 3, 'Product 3', 1, 150000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `author` varchar(50) NOT NULL,
  `publish` int(11) NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET latin1 NOT NULL,
  `description` varchar(500) CHARACTER SET latin1 NOT NULL,
  `photo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `attack` int(11) NOT NULL,
  `technic` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `power` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `thumbnail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `name`, `description`, `photo`, `attack`, `technic`, `stamina`, `defense`, `power`, `speed`, `age`, `weight`, `height`, `thumbnail`) VALUES
(1, 'Sendy Lumiwan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl ex, ornare vel libero sit amet, gravida porttitor ante. Nam sed magna ut metus elementum facilisis nec nec est. In purus augue, tincidunt ac aliquam a, accumsan accumsan felis. Proin sed elit</p>', 'player1.png', 92, 95, 87, 95, 92, 95, 18, 71, 184, 'sp1.png'),
(2, 'John Spartan', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl ex, ornare vel libero sit amet, gravida porttitor ante. Nam sed magna ut metus elementum facilisis nec nec est. In purus augue, tincidunt ac aliquam a, accumsan accumsan felis. Proin sed elit</p>', 'player2.png', 80, 75, 69, 61, 80, 70, 15, 75, 188, 'sp2.png'),
(6, 'Jeremy', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc nisl ex, ornare vel libero sit amet, gravida porttitor ante. Nam sed magna ut metus elementum facilisis nec nec est. In purus augue, tincidunt ac aliquam a, accumsan accumsan felis. Proin sed elit</p>\n', '4e299b99ad809c35060a32e8e1f54c77.png', 89, 78, 86, 78, 90, 88, 16, 75, 183, 'c9a0c1e169d14a2e4cb840c09ce8e8b3.png'),
(7, 'Dex', '<p>1.&nbsp; The Knicks passed their first overtime test with flying colors by knocking off the Lakers 113-109 in their lone visit to MSG this year.&nbsp; Kristaps Porzingis was spectacular and the bench crew lifted New York in the extra session as the home team improved to 14-13 overall and 13-5 at home.&nbsp; The Knicks were efficient by shooting 47.5 percent from the floor and a sparkling 40.9 percent behind the arc in the win.&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>\r\n\r\n<p>2.&nbsp; As mention', '749f9cbbbe69cee8c7aea5f985dbd7f8.png', 87, 59, 26, 78, 96, 88, 80, 85, 189, '3194615e87096b18694155e4d9196564.png');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`, `stock`) VALUES
(1, 'Product 1', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu.', 150000, 'product1.png', 1, 0),
(2, 'Product 2', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 150000, 'product2.png', 1, 0),
(3, 'Product 3', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 150000, 'product3.png', 1, 0),
(4, 'Product 4', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 150000, 'product4.png', 2, 0),
(5, 'Product 5', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 150000, 'product5.png', 2, 0),
(6, 'Product 6', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 20000, 'product6.png', 2, 0),
(7, 'Product 7', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 80000, 'product7.png', 2, 0),
(8, 'Product 8', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 150000, 'product8.png', 1, 0),
(9, 'Product 9', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 85900, 'product9.png', 2, 0),
(10, 'Product 10', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 78000, 'product10.png', 2, 0),
(11, 'Product 11', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 100000, 'product11.png', 2, 0),
(12, 'Product 12', 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc nisi ex, ornare vel libero sit amet, gravida porttitor ante. nam sed magna ut metus elementum facilisis nec nec est. in purus augue, tincidunt ac aliquam a, accumsan accumsan felis. proin sed elit facilisis, blandit tortor quis, vestibulum arcu', 100000, 'product12.png', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'costume'),
(2, 'accessories');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `home_score` int(5) NOT NULL,
  `away_score` int(5) NOT NULL,
  `id_home` int(11) NOT NULL,
  `id_away` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `home_score`, `away_score`, `id_home`, `id_away`, `date`) VALUES
(1, 20, 21, 1, 6, '2017-11-08'),
(2, 24, 23, 2, 1, '2017-10-17'),
(4, 22, 43, 1, 3, '2017-10-13'),
(5, 25, 75, 2, 1, '2017-09-01'),
(6, 74, 12, 1, 4, '2017-08-16'),
(7, 65, 54, 5, 2, '2017-08-16'),
(8, 50, 65, 4, 5, '2017-08-02'),
(9, 0, 0, 2, 4, '2017-12-29'),
(10, 12, 56, 3, 1, '2017-12-19'),
(11, 0, 0, 1, 2, '2018-01-21');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `background` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `description`, `background`, `url`) VALUES
(1, 'Slider 12', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet tristique nisl vitae volutpat. Nulla aliquet porttitor venenatis. Donec a dui et dui fringilla consectetur id nec massa. Aliquam erat ', 'homebg1.png', 'http://google.com'),
(2, 'Slider 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet tristique nisl vitae volutpat. Nulla aliquet porttitor venenatis. Donec a dui et dui fringilla consectetur id nec massa. Aliquam erat ', 'homebg5.png', 'http://google.com'),
(3, 'Slider 3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam hendrerit nisi sed sollicitudin pellentesque. Nunc posuere purus rhoncus pulvinar aliquam. Ut aliquet tristique nisl vitae volutpat. Nulla aliquet porttitor venenatis. Donec a dui et dui fringilla consectetur id nec massa. Aliquam erat ', 'homebg4.png', 'http://google.com'),
(4, 'test', 'test', '7619ee5a34a7411143d1ae80e2993438.png', 'https://www.youtube.com/watch?v=1xv_FeBGzfk');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`id`, `name`, `icon`) VALUES
(1, 'adidas', 'adidas.png'),
(2, 'nike', 'nike.png'),
(3, 'melbourne_RC', 'melbourne_RC.png'),
(4, 'hammer', 'hammer.png'),
(5, 'totally', 'totally.png');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `image`) VALUES
(1, 'Hawks', 'hawks.png'),
(2, 'Norwood', 'norwood.png'),
(3, 'ABC', '3ab10d6092dcbc8928fb34f898b963d8.png'),
(4, 'Dakville', 'dakville.png'),
(5, 'Shockers', 'shockers.png'),
(6, 'Scorpions', 'scorpions.png');

-- --------------------------------------------------------

--
-- Table structure for table `toko_sessions`
--

CREATE TABLE `toko_sessions` (
  `session_id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` char(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'mimin', '4297f44b13955235245b2497399d7a93', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko_sessions`
--
ALTER TABLE `toko_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channel`
--
ALTER TABLE `channel`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

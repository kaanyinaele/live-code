-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2020 at 08:54 PM
-- Server version: 5.7.30
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ogaworkm_ogawork`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `featured_image` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `description`, `is_delete`, `status`, `featured_image`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Simple Home Maintainance Tips', '<p>Here&nbsp;are&nbsp;some&nbsp;simple&nbsp;tips&nbsp;to&nbsp;keep&nbsp;your&nbsp;home&nbsp;in&nbsp;tip&nbsp;top&nbsp;position ,&nbsp;which&nbsp;will&nbsp;save&nbsp;you&nbsp;money&nbsp;in&nbsp;the&nbsp;long&nbsp;run.&nbsp;Read!</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Toilets</strong><br />\r\nWater leaking from your toilet tank will not only cost you money when it comes to your utility bill, but it can also cause water damage to your bathroom floor and premature wear of your toilet&rsquo;s internal workings. To find out whether your toilet tank is leaking, add some red food coloring to the water in the tank. Come back in about an hour and see if the water in the bowl is pink. If it is, you have a leak.<br />\r\nIf you find that your toilet is leaking from the tank to the bowl, the flapper needs to be replaced. To change your toilet&rsquo;s flapper, first shut off the water supply to your toilet. To do this, simply turn the water valve located directly behind the toilet. Remove the tank lid and flush the toilet in order to empty the tank. Use a towel or sponge to mop out any excess water left in the tank. Remove the flush chain from the lever, and then slide the old flapper up off the overflow tube. Slide the new flapper in place over the overflow tube, reconnect the chain, and turn the water supply back on.</p>\r\n\r\n<p><br />\r\n<strong>2. Faucets</strong><br />\r\nThe main cause of leaky faucets is worn out washers. The washers inside of the faucet handles are rubber and tend to wear out quickly. Replace them by turning off the main water supply, unscrewing the leaky handle that controls the flow of water to the spout, removing the old washer, and dropping in the new one.</p>\r\n\r\n<p><br />\r\n<strong>3. Washing Machine &amp; Dryer</strong><br />\r\nIt is important to regularly inspect your washing machine water supply hoses for leaks. One of the top reasons for insurance claims is for water damage caused by leaky washing machine supply lines. Inspect washing machine water supply lines at least annually and replace them every three years if they are plastic. If you notice that the metal ends of your water supply lines are discolored or rusty, replace them immediately.<br />\r\nFaulty washing machine drain hoses are as important as water supply lines when it comes to keeping water off of your floor and in your drain where it belongs. As with supply lines, regularly inspect the ends of your washing machine drain lines for discoloration or rust, and replace them immediately if you find evidence of leaking.<br />\r\nAdditionally, check the snugness of the drain lines by using a crescent wrench or a pair of pliers. You should not be able to tighten the line any further if the line is properly tightened. Plastic lines should be replaced every three years.<br />\r\nWhen it comes to your dryer, it is important to make sure that you regularly clean your lint screen in order to prevent fires. Not only will a clean lint screen prevent fires, but it will also increase the life of the heating element. Physically remove the lint from the screen between each load of laundry. Also, be sure to remove fabric softener residue by washing the screen with warm water and dish detergent once per week.<br />\r\n<br />\r\n<strong>4. Water Heater</strong><br />\r\nThere is nothing more frustrating than turning on the hot water in your shower and instead receiving cold water. Water heaters, like other appliances, need maintenance to increase longevity and reduce the possibility of damage.<br />\r\nWater has sediment suspended in it, and as the water sits in your water heater, these particles will often settle to the bottom of the tank, causing damage to the floor of your water heater. At least once per year, drain the water from your water heater and clean the inside surface of its floor.<br />\r\nTo drain your water heater, first turn off the water supply and power to the water heater. For electric water heaters, turning off the power means that you simply flip the circuit breaker to the &ldquo;off&rdquo; position. For gas water heaters, turn the thermostat setting to the pilot position.<br />\r\nNext, connect a water hose to the drain fitting at the bottom of the tank and put the other end in a place, such as your driveway, where the draining hot water won&rsquo;t cause any damage. A typical garden hose is a direct fit to the drain fitting. Turn on all the hot water faucets in your home and then open the drain valve on the water heater. Turn the water supply back on with the drain valve still open to remove any built up sediment in the bottom of the tank. Then close the drain valve, refill the tank, and turn the power back on.</p>\r\n\r\n<p><br />\r\n<strong>5. Plumbing</strong><br />\r\nIn order to keep water flowing freely through your pipes, keep the following things in mind:<br />\r\n&bull; Accumulating fats and oils are the main cause for clogs, so never pour fats or other oils down your drains. This includes oils that are not solid at room temperature. If you accidentally spill oils or fats down the drain, run hot water down your drain along with a healthy serving of dish washing liquid. The soap will emulsify the fat or oil and move it on down the pipe, preventing a clog.<br />\r\n&bull; Get a hair strainer for the bathtub drain. If fats and oils are the main source of clogs in the kitchen, hair is the primary culprit in the bathroom. If you have a strainer, make sure that you remove any accumulated hair from it following each shower. This will reduce the amount of hair that finds its way through the strainer and into your plumbing.<br />\r\n&bull; Skip the Drano. Though the acids it contains can help unclog a drain, they also cause significant damage to your plumbing, including premature leaking. This can lead to costly repairs later on. If your bathtub or toilet is completely clogged, use a small drain snake &ndash; which you can purchase at any hardware outlet &ndash; to pull the offending clog to the surface. If your kitchen sink is clogged, try plunging it before trying to snake the drain. If you cannot remove the clog using a drain snake, call a professional.</p>\r\n\r\n<p><br />\r\n<strong>6. Air Conditioning</strong><br />\r\nAir conditioners are among the most overlooked appliances when it comes to performing regular home maintenance. However, they can be one of the most costly appliances to repair.<br />\r\nRegularly inspect the condensation hose to make sure that water can flow freely from the line. If there is standing water where your condensation line drains, create a drainage path using a small garden trowel and line the path with gravel to keep mold and algae from forming, which can be a serious health hazard when the spores are drawn into the appliance and blown into your home.<br />\r\nAdditionally, keep the screen around your air conditioner free from debris to keep air flowing easily. This will prevent your air conditioner from using more power than necessary to keep your house cool and keep the internal parts from wearing out too quickly.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>7. Paint</strong><br />\r\nYou can easily give your house a facelift by repainting the interior. However, repainting the entire interior of your house can be costly and difficult to accomplish. You can save both time and money by strategically touching up your paint job every so often. The first thing you need is a spot-on color match. The only way to get this is to save paint from your current paint job for future touch-ups. If you have leftover paint, simply roll the paint over the dirty spots on your walls. When the paint dries, it will dry perfectly, leaving you with a wall that looks as though you just painted it.<br />\r\nIf you don&rsquo;t have any leftover paint, you can still touch up your walls, though your efforts will be more labor intensive than spot painting. Take a sample of your color to your local hardware outlet and have your paint tinted to match. When you are ready to touch up your walls, paint the dirty wall from corner to corner, being careful to keep the new paint off any surface you aren&rsquo;t looking to touch up. If there is a shade difference, you won&rsquo;t notice it, even if the wall you are painting butts up against another wall.<br />\r\nIf you are trying to cover up nicotine-stained walls, you will need to apply a stain blocker to the walls before applying paint. Nicotine will prevent your paint from adhering properly to the wall surface and will cause bubbles. Additionally, if stale smoke or other odor is an issue, add a few drops of vanilla to your paint. This will help combat odors that have seeped into your drywall.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>8. Refrigerators</strong><br />\r\nThe main component of your refrigerator that should get your attention is the door seals. Keeping your door seals tight will reduce the amount of energy it takes to keep your food cool or frozen, but will also keep your refrigerator working efficiently, preventing premature wear on internal parts.<br />\r\nTo test the door seals, close the door on a dollar bill and attempt to pull it out with the door closed. If you cannot easily pull the dollar bill out from the door, your seals are in good shape. However, if the bill slides out without much resistance, it&rsquo;s time to replace the seals. You can purchase new seals from any home repair outlet store.<br />\r\nAlso, if you have a refrigerator that has coils along the back, periodically vacuum these coils to remove dirt and dust build up. These coils contain the coolant the refrigerator uses to keep the internal temperature cold. If they become dirty, they won&rsquo;t work efficiently and your refrigerator may stop cooling altogether.<br />\r\nAs a general tip, keeping your refrigerator full uses less energy than trying to cool when it&rsquo;s empty. Therefore, keep as many items in your refrigerator as possible to help reduce energy costs.<br />\r\n<br />\r\n<strong>9. Gutters</strong><br />\r\nWhile gutters may go practically unnoticed when you look at your house, they are the main line of defense between your foundation and siding and the elements. Gutters are designed to capture water and debris runoff from your roof and divert it away from your foundation, and one of the main causes of water accumulation in basements is a lack of gutter maintenance and proper water diversion.<br />\r\nClean your gutters at least once per year by physically removing debris from the channels and rinsing them thoroughly by using a garden hose. Avoid installing gutter guards &ndash; not only do these not adequately prevent debris from entering your gutters, they also make it extremely difficult (if not impossible) to properly clean your gutter system.<br />\r\nAlso, be sure to regularly check that your gutters are properly affixed to your fascia boards, and replace any sections that appear to be damaged or leaking.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>10. Roof</strong><br />\r\nPeriodically check your roof for damage. Damaged, discolored, or gravel-less shingles should be quickly replaced to prevent the need to replace your roof, water-damaged trusses, or drywall when you finally discover a leak. During the inspection of your roof, pay special attention to shingles that surround skylights, vents, and chimneys, as these areas are the most leak-prone.</p>\r\n\r\n<p><br />\r\n<em><strong>Final Word</strong></em><br />\r\n<em>Keeping your home properly maintained will not only save you money by increasing the longevity of your appliances and existing structures, but it will also help you become more energy-efficient and these tips merely scratch the surface of the things you can do around your home to keep everything running in tiptop shape.</em><br />\r\n<em>What other tips can you share for DIY home maintenance?</em><br />\r\n<br />\r\nCredit - <a href=\"https://www.moneycrashers.com/diy-home-maintenance-tips-ideas/\" target=\"_blank\">https://www.moneycrashers.com/diy-home-maintenance-tips-ideas/</a></p>', 0, 1, '648009788.jpg', '506447693.jpg', '2020-06-03 12:01:00', '2020-06-03 06:31:00'),
(2, 'Martha Stewart on House Keeping!', '<p><b><i>Martha&nbsp;Stewart’s Advice For What To Clean Every Day In Order To Keep A Clean Home Look no further than this advice from the queen of clean herself.&nbsp;</i></b></p><p><br> <b>CARINA WOLFF</b>   <br><br></p><p><b></b><b></b><b>SHAREPIN IT</b> <b></b><br><b></b>The products and services mentioned below were selected independent of sales and advertising. However, Simplemost may receive a small commission from the purchase of any products or services through an affiliate link to the retailer\'s website.&nbsp; Everyone wants a clean and organized living space, but to truly get it, you’re going to need to put in some work. You don’t have to clean your house from floor to ceiling every single day to maintain your space, but you do need to stay on top of certain tasks to help you keep your home clean.&nbsp;<b></b><b></b></p><p><br>If you’re not sure where to begin, you might want to heed some advice from the lifestyle expert herself: Martha Stewart. In her book, Martha Stewart’s Homekeeping Handbook, she suggests six simple daily steps to keeping your house clean and pristine.&nbsp;</p><p><br></p><p><b><i></i>1. Make Your Bed <i></i></b><br>Easy enough. Making your bed everyday keeps your bedroom looking organized, and it only takes a few minutes each morning to accomplish. When it’s time to crawl in at night, you’ll b<u></u><u></u>e so happy getting into a bed without tangled, messy sheets and blankets.&nbsp;</p><p><b><br></b></p><p><b>2. Clear Out Clutter </b><br>If something is out of place, put it back where it belongs. Take five minutes each day to put your possessions back in their rightful spot. And don’t be afraid to purge items you haven’t been using on the regular.&nbsp;</p><p><b><br></b></p><p><b>3. Sort The Mail </b><br>You likely get mail everyday, so instead of letting it pile up on a table, open it, and place it into an appropriate organized folder so you don’t lose track of it.&nbsp;</p><p><b><br></b></p><p><b>4. Clean As You Go</b> <br>Don’t let those dishes pile up all day. Once you’ve finished making lunch, clean up after yourself so you don’t have a huge mess come dinner.&nbsp;</p><p><b><br></b></p><p><b>5. Instantly Wipe Up Spills</b></p><p>Same goes for the kitchen counter or dining room floors. Clean up spills instantly so they don’t stain and are easier to wipe.&nbsp;</p><p><b><br></b></p><p><b>6. Sweep </b><br>Don’t let dirt and debris gather on the kitchen floor: Take those few extra minutes and do a little sweep each day. You’ll thank yourself later!&nbsp;</p><p><br>Credit - <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.simplemost.com/martha-stewart-what-clean-every-day-clean-home/\">https://www.simplemost.com/martha-stewart-what-clean-every-day-clean-home/</a> </p>', 0, 0, '95061607.jpg', '2144854528.jpg', '2020-04-22 12:58:55', '2020-04-22 07:28:55'),
(3, '5 Tips for Better Waste Management at Home', '<p></p><p><b>Individuals and\r\nbusinesses can both do their part to help decrease the amount of waste that is\r\nplaced in landfills every day. Below are 5 tips for better waste management at\r\nhome that can be started today, and utilized by both families and companies.</b></p><p><b><br></b></p>\r\n\r\n<p><b>R</b><b></b><b>ecycle</b></p>\r\n\r\n<p>State law in CT\r\ninsists that metal and glass food containers, as well as plastic with resin\r\ncodes 1 and 2 be recycled.</p>\r\n\r\n<p>Other items that you\r\ncan <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.johnsrefuse.com/single-stream-recycling-in-ct/\">recycle</a>&nbsp;include:</p>\r\n\r\n<ul>\r\n <li>Clothing can be donated or\r\n     traded with other families.</li>\r\n <li>Appliances can be\r\n     recycled. </li></ul><br><p><b>Compost Food Scraps</b></p>\r\n\r\n<p>Even though the state\r\ndoes not have a collection program, people and <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.johnsrefuse.com/commercial-trash-services-in-ct/\">businesses</a>&nbsp;can\r\ncompost their own food scraps. Large composters need to be placed in an\r\nappropriate place. A good residential waste management company in CT will be\r\nable to provide information on where a composter can be placed on your\r\nproperty.</p><br>\r\n\r\n<p><b>Re-usable Shopping Bags</b></p>\r\n\r\n<p>Most grocery stores\r\nnow sell inexpensive material shopping bags. These are not only better for the\r\nenvironment but they are stronger than any plastic or paper bag available.</p><p><br></p>\r\n\r\n<p><b>Reduce Paper Products</b></p>\r\n\r\nPaper is the recyclable\r\nmaterial that is thrown away the most, last year alone about 4.5 million tons\r\nof paper were thrown away. Junk mail is a large part of garbage waste, call\r\nyour local Post Office to see how you can be removed from any undesired mailing\r\nlists. Another great way to reduce the amount of paper you use is to switch out\r\npaper towels for rags, that can be washed and reused.\r\n\r\n\r\n\r\n<p><br></p>', 0, 0, '805908298.jpg', '831565733.jpg', '2020-04-22 11:47:57', '2020-04-22 06:17:57'),
(4, '7 essential maintenance tips for your business office', '<p></p><p>General business\r\noffice maintenance is usually one of the last things on the minds of business\r\nowners.</p>\r\n\r\n<p>If you must run a\r\nsuccessful business then you need to take office maintenance very seriously.</p>\r\n\r\n<p>Sometimes people fall\r\nto the trap of thinking that things can barely go wrong.</p>\r\n\r\n<p>In some cities,\r\nignoring office maintenance can put you in trouble because you will be in\r\nviolation of the terms of an office lease.  If you don’t take it\r\nseriously, you run the risk of putting your business out of action. In fact,\r\nconcerns about structural problems, electric safety and other issues have put\r\nmore than a few businesses out of action, forcing some to permanently shut\r\ndown.</p>\r\n\r\n<p>Don’t be that guy.\r\nLet’s go over 7 essential maintenance tips for your business office:</p><p><br></p>\r\n\r\n<p><b>1. &nbsp;  </b><b>Make sure you run regular checks</b></p>\r\n\r\n<p>Most maintenance\r\nissues are simple and easy to do. Large problems arise when they aren’t taken\r\ncare of on time. Most often go unnoticed until it is too late to cry when the\r\nhead is off.  For example, rust on business piping or a little crack on\r\nthe wall might appear to be harmless at first but can develop over time to a\r\nmuch bigger problem.</p>\r\n\r\n<p>You need to spot early\r\nsigns by looking for them. Waiting for maintenance problems to show themselves\r\nis a gamble you shouldn’t take.</p>\r\n\r\n<p>Build a maintenance\r\nchecklist of your office equipment and set out a specific time to check up on\r\nthem monthly.</p><p><br></p>\r\n\r\n<p><b>2. &nbsp;  </b><b>Don’t ignore repairs</b></p>\r\n\r\n<p>If detected early, do\r\nnot hesitate to make the necessary repairs on time.  Like an ailment,\r\nproblems are much easier to handle when they are tackled head-on. If you wait\r\ntill they start to affect business operation, you run the risk of making huge loses\r\nin late repairs.</p>\r\n\r\n<p>It can be tempting to\r\nsave money by adopting a wait and see approach but this is very risky behavior\r\nthat can have negative effect on your business.</p>\r\n\r\n<p>More often than not,\r\nprevention is never as costly as a reaction. The moment you spot a problem the\r\nfee you pay to deal with it right now will be much lesser than coupling with\r\nthe potential damage.</p><p><br></p>\r\n\r\n<p><b>3. &nbsp;  </b><b>By all means avoid DIY maintenance</b></p>\r\n\r\n<p>Home and office\r\nrepairs are carried out by millions of people each year. It’s often the\r\npractice of business owners to carry out DIY maintenance on basic repairs. We’d\r\nstrongly advise against it.  Leave repairs and maintenance issues to\r\nqualified professionals.</p>\r\n\r\n<p>A\r\nDIY maintenance project will happily steal valuable time from you – time that\r\nyou can channel to more productive ventures. Business owners are very busy and\r\ntime spent on DIY projects isn’t worth the stress.</p>\r\n\r\n<p>If\r\nyou feel the DIY job is easy and doesn’t require the impute of a professional –\r\nthink again. A badly finished or unfinished DIY project might not have an\r\nadverse effect on the home but the same can’t be said in a business\r\nenvironment. This is why <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.shinecleaningsolutions.co.uk/commercial-cleaning-glasgow/\">office cleaning in Glasgow</a>&nbsp;makes\r\nit a commitment to educating business owners on the need to employ professional\r\ncleaning services.</p>\r\n\r\n<p>Taking\r\nup a DIY project that you don’t complete properly can have widespread\r\nrepercussions for the whole office. You must consider business reputation on\r\nyour clients, investors and staff.</p><p><br></p>\r\n\r\n<p><b>4. &nbsp;  </b><b>Modernize your business\r\nenvironment</b></p>\r\n\r\n<p>Replacing\r\noutdated equipment is a very good way to keep the office in top form. \r\nOutdated office equipment and elements are more likely going to cause you\r\nproblems. The investment needed to make modernize changes can seem intimidating\r\nat first but it’s a surefire way to make lasting changes around the office.</p>\r\n\r\n<p>By\r\noffice elements we are talking about things like the plumbing system, heating\r\nsystem, electrical installations, roofing, ceiling panels, lighting system etc.</p>\r\n\r\n<p>Make\r\nit a habit to change outdated elements form your business office and you won’t\r\nfeel the weight of having to do it all at once.</p><p><br></p>\r\n\r\n<p><b>5. &nbsp;  </b><b>Keep the heating, ventilation and\r\nconditioning systems in mind</b></p>\r\n\r\n<p>In\r\nthe likely scenario that you have modernized elements in your office you still\r\nneed to keep a close eye on all of them.  The HVAC needs regular\r\nmaintenance to run smoothly. Proper upkeep will keep utility bills on the low\r\nand ensure you make the most out of this equipment. Call in a reliable\r\nprofessional if repairs or maintenance is needed.</p><p><br></p>\r\n\r\n<p><b>6. &nbsp;  </b><b>Clean out your business\r\nenvironment regularly</b></p>\r\n\r\n<p>Clean\r\nfloors can make a big statement. Dirty floors are a no-no when it comes to\r\ndoing good business. Invest in employing cleaners who take out turn to ensure\r\nthat the floors are properly taken care off.</p>\r\n\r\n<p>If\r\nyou want to make a lasting impression on clients, investors and staffs make\r\nsure the floors are neat.</p><p><br></p>\r\n\r\n<p><b>7. &nbsp;  </b><b>Repaint walls and change out\r\nfurniture if need be</b></p>\r\n\r\n<p>Wall\r\npaint isn’t for aesthetic purposes only, they can also protect the building in times\r\nof harsh weather and fire outbreak. &nbsp;There are certain paint colors known\r\nto have a positive impact on productivity. Consult with a professional and have\r\nyour wall paints changed or repainted to suit your business goals.</p>\r\n\r\n<p>Don’t\r\nforget about maintaining office furniture too.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\nCredit - <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.bmmagazine.co.uk/business/7-essential-maintenance-tips-for-your-business-office/\">https://www.bmmagazine.co.uk/business/7-essential-maintenance-tips-for-your-business-office/</a>\r\n\r\n\r\n\r\n<p></p>', 0, 0, '1820234052.jpg', '359348814.jpeg', '2020-04-22 12:38:20', '2020-04-22 07:08:20'),
(5, 'MICROSOFT PLLATFOR', '<p><img alt=\"\" src=\"http://ogaworkmen.devtechnosys.tech/public/images/download_1588657221.png\" style=\"height:110px; width:108px\" /></p>', 0, 0, '851595330.jpg', '769416742.jpg', '2020-06-02 11:46:58', '2020-06-02 06:16:58'),
(6, 'SEWAGE DISPOSAL', '<p>WE ARE SPEIALIST IN SEWAGE DISPOSAL</p>', 0, 0, '1204051533.jpg', '2067803865.jpg', '2020-06-02 06:22:21', '2020-06-02 06:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `booking_price`
--

CREATE TABLE `booking_price` (
  `id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `calculate_price` varchar(255) NOT NULL,
  `booking_id` varchar(255) NOT NULL,
  `vat` varchar(256) NOT NULL COMMENT 'in %',
  `discount` varchar(256) NOT NULL COMMENT 'in %',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_price`
--

INSERT INTO `booking_price` (`id`, `service_name`, `cost`, `quantity`, `calculate_price`, `booking_id`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'home service', '4', '4', '16', '68', '', '', '2020-02-21 05:29:22', '2020-02-21 05:29:22'),
(2, 'sfsdf', '22', '5', '110', '69', '', '', '2020-02-21 06:53:06', '2020-02-21 06:53:06'),
(3, 'test metetr', '15', '2', '30', '73', '', '', '2020-02-21 08:43:14', '2020-02-21 08:43:14'),
(4, 'fen', '15', '5', '75', '73', '', '', '2020-02-21 08:43:14', '2020-02-21 08:43:14'),
(5, 'gjgj', '7', '3', '21', '76', '', '', '2020-02-21 09:17:47', '2020-02-21 09:17:47'),
(6, 'jjkj', '5', '8', '40', '76', '', '', '2020-02-21 09:17:47', '2020-02-21 09:17:47'),
(7, 'sddddddd', '33', '3', '99', '74', '', '', '2020-02-24 01:15:49', '2020-02-24 01:15:49'),
(8, 'fan', '15', '10', '150', '77', '', '', '2020-02-24 23:31:16', '2020-02-24 23:31:16'),
(9, 'cooler', '1500', '5', '7500', '77', '', '', '2020-02-24 23:31:16', '2020-02-24 23:31:16'),
(10, 'mobile', '5000', '5', '25000', '77', '', '', '2020-02-24 23:31:16', '2020-02-24 23:31:16'),
(11, 'mobile', '5000', '5', '25000', '78', '', '', '2020-02-24 23:40:13', '2020-02-24 23:40:13'),
(12, 'mobile', '5000', '5', '25000', '79', '', '', '2020-02-25 00:32:15', '2020-02-25 00:32:15'),
(13, 'mobile', '5000', '5', '25000', '81', '', '', '2020-02-25 02:28:08', '2020-02-25 02:28:08'),
(14, 'Cut grass', '122', '3', '366', '80', '', '', '2020-02-25 06:26:12', '2020-02-25 06:26:12'),
(15, 'Clean tables', '10', '2', '20', '80', '', '', '2020-02-25 06:26:12', '2020-02-25 06:26:12'),
(16, 'efefe', '4', '4', '16', '83', '', '', '2020-02-26 00:20:50', '2020-02-26 00:20:50'),
(17, 'test', '12', '6', '72', '84', '', '', '2020-03-03 08:26:02', '2020-03-03 08:26:02'),
(18, 'gdfgdg', '5', '5', '25', '86', '12', '10', '2020-03-06 01:28:15', '2020-03-06 01:28:15'),
(19, 'fgf', '5', '5', '25', '86', '12', '10', '2020-03-06 01:28:15', '2020-03-06 01:28:15'),
(20, 'test', '12', '2', '24', '88', '12', '6', '2020-03-06 04:23:32', '2020-03-06 04:23:32'),
(21, 'uiui', '9', '9', '81', '87', '12', '10', '2020-03-06 07:26:01', '2020-03-06 07:26:01'),
(22, 'uyuiui', '1', '1', '1', '87', '12', '10', '2020-03-06 07:26:01', '2020-03-06 07:26:01'),
(23, '444444', '4', '4', '16', '85', '12', '0', '2020-03-06 07:56:15', '2020-03-06 07:56:15'),
(24, 'rttrt', '1', '1', '1', '90', '12', '0', '2020-03-14 05:05:45', '2020-03-14 05:05:45'),
(25, 'dsfdf', '21', '2', '42', '89', '12', '20', '2020-03-14 05:21:05', '2020-03-14 05:21:05'),
(26, 'dfgfdg', '5', '5', '25', '91', '12', '0', '2020-03-14 05:45:06', '2020-03-14 05:45:06'),
(27, 'fdgrd', '4', '4', '16', '92', '12', '0', '2020-03-15 23:23:10', '2020-03-15 23:23:10'),
(28, 'fdgrd', '4', '4', '16', '92', '12', '0', '2020-03-15 23:27:06', '2020-03-15 23:27:06'),
(29, 'fdgrd', '4', '4', '16', '92', '12', '0', '2020-03-15 23:31:34', '2020-03-15 23:31:34'),
(30, 'fdgrd', '4', '4', '16', '92', '12', '0', '2020-03-15 23:31:44', '2020-03-15 23:31:44'),
(31, 'fdgrd', '4', '4', '16', '92', '12', '0', '2020-03-15 23:32:35', '2020-03-15 23:32:35'),
(32, 'fff', '4', '4', '16', '93', '12', '12', '2020-03-15 23:38:01', '2020-03-15 23:38:01'),
(33, '3ff', '3', '3', '9', '93', '12', '12', '2020-03-15 23:38:01', '2020-03-15 23:38:01'),
(34, 'fff', '4', '4', '16', '93', '12', '12', '2020-03-15 23:49:48', '2020-03-15 23:49:48'),
(35, '3ff', '3', '3', '9', '93', '12', '12', '2020-03-15 23:49:48', '2020-03-15 23:49:48'),
(36, 'fff', '4', '4', '16', '93', '12', '12', '2020-03-15 23:53:04', '2020-03-15 23:53:04'),
(37, '3ff', '3', '3', '9', '93', '12', '12', '2020-03-15 23:53:04', '2020-03-15 23:53:04'),
(38, 'fff', '4', '4', '16', '93', '12', '12', '2020-03-15 23:53:26', '2020-03-15 23:53:26'),
(39, '3ff', '3', '3', '9', '93', '12', '12', '2020-03-15 23:53:26', '2020-03-15 23:53:26'),
(40, 'tytr', '6', '6', '36', '94', '12', '0', '2020-03-15 23:55:16', '2020-03-15 23:55:16'),
(41, 'testtt', '4', '4', '16', '95', '12', '0', '2020-03-16 00:01:14', '2020-03-16 00:01:14'),
(42, '22fddf', '22', '22', '484', '96', '12', '22', '2020-03-16 00:09:50', '2020-03-16 00:09:50'),
(43, 'trt', '7', '7', '49', '97', '12', '0', '2020-03-16 00:18:55', '2020-03-16 00:18:55'),
(44, 'ghgfhf', '22', '22', '484', '98', '12', '0', '2020-03-16 00:25:02', '2020-03-16 00:25:02'),
(45, 'tytfy', '4', '4', '16', '99', '12', '0', '2020-03-16 02:12:33', '2020-03-16 02:12:33'),
(46, 'ds fdfdf', '55', '656', '36080', '100', '12', '0', '2020-03-16 05:49:33', '2020-03-16 05:49:33'),
(47, 'TESTING service', '234', '343', '80262', '102', '12', '0', '2020-03-19 04:37:17', '2020-03-19 04:37:17'),
(48, 'test', '2', '5', '10', '103', '12', '0', '2020-03-19 04:56:32', '2020-03-19 04:56:32'),
(49, 'test1', '4', '5', '20', '103', '12', '0', '2020-03-19 04:56:32', '2020-03-19 04:56:32'),
(50, 'TESTING service', '23', '43', '989', '104', '12', '0', '2020-03-19 05:24:42', '2020-03-19 05:24:42'),
(51, 'TESTING service 324', '34', '23', '782', '105', '12', '0', '2020-03-19 05:28:46', '2020-03-19 05:28:46'),
(52, 'TESTING service vinita', '54', '7', '378', '106', '12', '0', '2020-03-19 05:33:29', '2020-03-19 05:33:29'),
(53, 'TESTING service 324', '23', '34', '782', '107', '12', '0', '2020-03-19 05:49:48', '2020-03-19 05:49:48'),
(54, 'TESTING service', '23', '7', '161', '108', '12', '0', '2020-03-19 06:40:46', '2020-03-19 06:40:46'),
(55, 'Work', '65', '5', '325', '109', '12', '0', '2020-03-19 06:51:19', '2020-03-19 06:51:19'),
(56, 'gtgf', '41', '41', '1681', '110', '12', '0', '2020-03-19 07:03:07', '2020-03-19 07:03:07'),
(57, 'aasas', '122', '2', '244', '111', '12', '0', '2020-03-20 04:50:41', '2020-03-20 04:50:41'),
(58, 'asas', '12', '3', '36', '111', '12', '0', '2020-03-20 04:50:41', '2020-03-20 04:50:41'),
(59, 'dfg dsfg', '345', '54', '18630', '112', '12', '0', '2020-03-20 08:33:29', '2020-03-20 08:33:29'),
(60, 'Maintainence Service', '34', '5', '170', '113', '12', '0', '2020-03-21 09:34:59', '2020-03-21 09:34:59'),
(61, 'Ac Repairs', '2000', '2', '4000', '123', '12', '0', '2020-03-26 12:25:04', '2020-03-26 12:25:04'),
(62, 'Plumbing services', '2000', '4', '8000', '125', '12', '0', '2020-03-27 08:28:39', '2020-03-27 08:28:39'),
(63, 'Fix sockets', '2000', '6', '12000', '126', '12', '0', '2020-03-27 10:03:52', '2020-03-27 10:03:52'),
(64, 'Electrical installationa', '20000', '12', '240000', '138', '12', '23', '2020-04-03 06:48:19', '2020-04-03 06:48:19'),
(65, 'box fixing', '45000', '21', '945000', '138', '12', '23', '2020-04-03 06:48:19', '2020-04-03 06:48:19'),
(66, 'TESTING service', '23', '7', '161', '139', '12', '0', '2020-04-03 11:05:53', '2020-04-03 11:05:53'),
(67, 'Work', '34', '43', '1462', '139', '12', '0', '2020-04-03 11:05:53', '2020-04-03 11:05:53'),
(68, 'new service', '34', '7', '238', '140', '12', '0', '2020-04-03 13:14:48', '2020-04-03 13:14:48'),
(69, 'Work', '34', '5', '170', '140', '12', '0', '2020-04-03 13:14:48', '2020-04-03 13:14:48'),
(73, 'Service 2', '1', '6', '6', '141', '12', '0', '2020-04-06 04:38:55', '2020-04-06 04:38:55'),
(74, 'TESTING service 324', '23', '43', '989', '141', '12', '0', '2020-04-06 04:38:55', '2020-04-06 04:38:55'),
(75, 'TESTING service', '23', '23', '529', '141', '12', '0', '2020-04-06 04:38:55', '2020-04-06 04:38:55'),
(76, 'TESTING service', '34', '5', '170', '142', '12', '0', '2020-04-06 14:15:08', '2020-04-06 14:15:08'),
(77, 'Work', '34', '7', '238', '142', '12', '0', '2020-04-06 14:15:08', '2020-04-06 14:15:08'),
(78, 'Good Work', '4', '43', '172', '142', '12', '0', '2020-04-06 14:15:08', '2020-04-06 14:15:08'),
(79, 'All done', '34', '34', '1156', '142', '12', '0', '2020-04-06 14:15:08', '2020-04-06 14:15:08'),
(80, 'TESTING service vinita', '3', '5', '15', '142', '12', '0', '2020-04-06 14:15:08', '2020-04-06 14:15:08'),
(81, 'dfgd', '5', '5', '25', '143', '12', '0', '2020-04-08 00:42:52', '2020-04-08 00:42:52'),
(82, 'TESTING service', '23', '23', '529', '137', '12', '0', '2020-04-08 00:44:21', '2020-04-08 00:44:21'),
(83, 'dfgd', '5', '5', '25', '143', '12', '0', '2020-04-08 00:50:24', '2020-04-08 00:50:24'),
(84, 'gfgf', '5', '5', '25', '133', '12', '0', '2020-04-08 01:03:05', '2020-04-08 01:03:05'),
(85, 'gfgf', '5', '5', '25', '133', '12', '0', '2020-04-08 01:07:26', '2020-04-08 01:07:26'),
(86, 'gfgf', '5', '5', '25', '133', '12', '0', '2020-04-08 01:17:46', '2020-04-08 01:17:46'),
(87, 'TESTING service', '23', '43', '989', '132', '12', '0', '2020-04-08 01:38:47', '2020-04-08 01:38:47'),
(91, 'TESTING service 324', '34', '7', '238', '144', '12', '0', '2020-04-08 05:32:36', '2020-04-08 05:32:36'),
(92, 'htrtwt', '5', '5', '25', '147', '12', '0', '2020-04-09 05:32:16', '2020-04-09 05:32:16'),
(93, 'jbj', '6', '8', '48', '148', '12', '0', '2020-04-09 07:09:20', '2020-04-09 07:09:20'),
(96, 'Work', '54', '34', '1836', '146', '12', '0', '2020-04-14 08:27:46', '2020-04-14 08:27:46'),
(99, 'Cleaning', '32', '32', '1024', '149', '12', '0', '2020-04-17 10:42:51', '2020-04-17 10:42:51'),
(100, 'Washing', '43', '32', '1376', '149', '12', '0', '2020-04-17 10:42:51', '2020-04-17 10:42:51'),
(101, 'Cleaning', '4', '5', '20', '151', '12', '0', '2020-04-17 10:52:35', '2020-04-17 10:52:35'),
(102, 'Washing', '43', '54', '2322', '151', '12', '0', '2020-04-17 10:52:35', '2020-04-17 10:52:35'),
(103, 'TTT', '5', '5', '25', '145', '12', '0', '2020-04-25 08:00:05', '2020-04-25 08:00:05'),
(104, 'FDSF', '22', '2', '44', '131', '12', '0', '2020-04-25 08:01:42', '2020-04-25 08:01:42'),
(105, 'KKK2', '2', '2', '4', '122', '12', '0', '2020-04-25 08:03:48', '2020-04-25 08:03:48'),
(106, 'DSF', '3', '3', '9', '114', '12', '0', '2020-04-25 08:04:54', '2020-04-25 08:04:54'),
(107, 'DAD2', '2', '2', '4', '152', '12', '0', '2020-04-25 08:06:26', '2020-04-25 08:06:26'),
(108, 'Electrical installation', '1000', '50', '50000', '156', '12', '5', '2020-06-04 05:37:39', '2020-06-04 05:37:39'),
(109, 'switch  fixing', '34', '21', '714', '156', '12', '5', '2020-06-04 05:37:39', '2020-06-04 05:37:39'),
(110, 'switch  fixing', '5000', '34', '170000', '155', '12', '5', '2020-06-05 01:54:04', '2020-06-05 01:54:04'),
(111, 'hullage fising', '200', '54', '10800', '155', '12', '5', '2020-06-05 01:54:04', '2020-06-05 01:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(233) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(50) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p><i><b></b></i>Existence\r\nrequires maintenance and we constantly try to improve our homes and\r\nworking spaces, build new houses and continuously keep them in top\r\nshape.\r\n</p><p>Getting\r\nour home and office maintenance services can be a drag, we look for\r\nplumbers from the plumbers shed, electricians at their workshops, and\r\npainters across the streets.We\r\nleave our homes and offices in disrepair because we are too busy and\r\nsometimes, we can’t find the right artisans.\r\n</p><p>At\r\nOgaworkman, we understand, so we offer our services to you to help\r\nmaintain your homes and offices. We also work with you on your new\r\nbuilding projects and installations.</p>\r\n<p>From\r\nthe comfort of your home and offices we really are just a click\r\naway.We provide an online platform with hundreds of trained and\r\ncertified artisans to meet your everyday home and office maintenance\r\nservice needs.</p>\r\n<p>We\r\nbring comfort, convenience and joy installing, repairing, servicing\r\nand engaging with you on your new building projects.</p>\r\n<p></p>\r\n\r\n\r\n	\r\n	\r\n	\r\n	\r\n		Ogaworkman.com.ng\r\nis in the business providing easy access to home and office\r\nmaintenance, services via our web and online platforms. We have in\r\nour pool hundreds of trained and certified artisans with their\r\nbackgrounds checked; providing home and office maintenance services\r\nto the Nigerian populace at premium quality control, effectively\r\nregulated, timely and at good bargain price. We are the go-to\r\norganization for home maintenance services.  Additionally, we provide\r\nwell-trained and pre-qualified artisan staffing solution to\r\nindividuals and businesses requiring artisans to work along sides\r\nwith them whether at construction sites, factories, offices and\r\nhomes, for short-term or long-term projects and works.\r\n<p>\r\n<br>\r\n\r\n</p>\r\n<p>The\r\nmanagement of Ogaworkman is made up of professional maintenance\r\nEngineers, Information Technology professionals, Business\r\nadministrators, Home builders and Architects with a combined\r\nexperience of over 60 years in Estate management and development, Oil\r\nand Gas, Information Technology, Finance and logistics, and\r\nArchitectural business areas within Nigeria and from other parts of\r\nthe world. \r\n</p>\r\n<p>\r\n<br>\r\n\r\n</p>\r\n<p>These\r\nrich crop of professionals, most of whom have worked within and\r\noutside of the country came together, recognizing the pivotal role\r\nartisans play in our lives and businesses, appreciating the gaps in\r\ncapacity and professionalism, and low standards of service provision,\r\naim first to build capacity in artisan’s professionalism and as\r\nwell  provide a reference place for individual families and\r\nbusinesses to procure services for their house/home and office\r\nmaintenance and service needs, thus enriching client’s maintenance\r\nexperience on the one hand, whilst also providing a pool of \r\nwell-trained artisans required for temporary and long-term manpower\r\nneeds. \r\n</p>\r\n<p>\r\n<br>\r\n\r\n</p>\r\n<p>Our\r\nkey value proposition is to make the engagement and procurement of\r\nartisan services seamless, effective and affordable whilst also\r\nproving a rich pool and reservoir of well trained and qualified\r\nartisans ready for deployment in the home and business environment.</p><p><br></p><h2>               Our\r\nVision</h2><p></p><p>Provision\r\nof world class home maintenance services by skilled and qualified\r\nArtisans with service offering that compares with the best in the\r\nworld.</p><p><b><br></b></p><h2>              Our\r\nMission</h2><p><b></b></p><p></p><p>Providing\r\njoyful service, comfort and convenience to clients using skilled,\r\ntrained and verified artisans.</p><p><br></p><h2>Our\r\nCore values:-</h2><p><b></b></p><ul>\r\n	<li>\r\n<h2>\r\n	Integrity</h2>\r\n	</li><li>\r\n<h2>\r\n	Excellence</h2>\r\n	</li><li>\r\n<h2>\r\n	Commitment</h2>\r\n	</li><li>\r\n<h2>\r\n	Professionalism</h2>\r\n	</li><li>\r\n<h2>\r\n	Customer\r\n	Service</h2></li></ul><ul>\r\n	<li>\r\n<h2>\r\n	security</h2></li></ul>\r\n\r\n<br>\r\n\r\n<br><p></p>', 'About-us', '2019-11-04', '2020-06-03'),
(2, 'Privacy Policy', '<blockquote><h4></h4><h5><p><b></b>Introduction<b></b></p>\r\n\r\n<p>Welcome to\r\nOgaworkman.com.ng’s privacy policy. By visiting Ogaworkman.com.ng is an\r\nindication that you are accepting the terms and conditions in this Privacy\r\nNotice. We are extremely excited\r\nyou are reading this information however, via this policy you will understand\r\nhow Ogaworkman.com.ng manages and uses your personal and corporate data.\r\nOgaworkaman.com.ng.  has never sold and\r\nwill never  sell, exchange or lease, your\r\npersonal information with any third parties ways other than described in our\r\npolicy.</p>\r\n\r\n<p><b>Privacy Notice</b></p>\r\n\r\n<p>Your privacy\r\nis important and will always be to Ogaworkman.com.ng and so, we’ve put together\r\na privacy policy that take-cares of how we collect, store, use, disclose and\r\ntransfer your personal information and your right to the personal data we hold.\r\n</p>\r\n\r\n<p><b>Data Protection Policy</b></p>\r\n\r\n<p>How we comply\r\nwith our obligations under the General Data Protection Regulations (GDPR), setting\r\nout the duty of Professionals and clients</p>\r\n\r\n<p>Data\r\nprotection is of a particularly high priority for the management of\r\nOgaworkman.com.ng. The use of our internet pages is possible without the supply\r\nof one’s personal information; However, if the user wants to apply special\r\ncompany services via our website for instant: Signing Up, making of job request,\r\nand joining  our Team Professionals\r\ne.t.c., processing of personal data could become necessary.</p>\r\n\r\n<p>The\r\nprocessing of personal information, such as; Name, Address, Telephone Number,\r\nE-mail Address of user shall &nbsp; always be\r\nin line with the General Data Protection Regulation (GDPR) , and in accordance with\r\nthe  country specific data protection\r\nregulations application to the Ogaworkman.com.ng. Hence, via this data\r\nprotection declaration, we generally obtain consent from the data subject. </p>\r\n\r\n<p><b>What Personal Data Do We Collect?</b></p>\r\n\r\n<p>When you send\r\nin your job request or signup for service request, you are providing us with\r\nyour name, address, telephone number, email address, and personal or corporate\r\ndetails, plus a listing of your desired job categories and previous fault on\r\nequipment if any. </p>\r\n\r\n<p><b>The Personal Data you Make Public</b></p>\r\n\r\n<p>The personal\r\ndata collected is processed as your profile, which will be available only to\r\nyou as a sole user. However, Ogaworkman.com.ng gives its user the chance to\r\npost content through various social media sites. Hence, your interactions with\r\nsuch websites are publicly viewable outside of the domain. For every social\r\nmedia site has its own privacy policy which may be more or less protected than\r\nour policy, you are therefore advised not to use these online tools, if you do\r\nnot wish to share or disclosed this information. For your own good, think\r\ncarefully before sharing any of your information with anyone else.</p>\r\n\r\n<p><b>Why Do We Collect This Information?</b></p>\r\n\r\n<p>The major\r\nreason why we collect data from you is to make your Ogaworkman.com.ng\r\nexperience possible and successful for you. Nevertheless, the information will\r\nbe used as follows:</p>\r\n\r\n<p>We ask for\r\nyour name to make it possible for you to create and maintain your account, so\r\nyou can become an Ogaworkman.com.ng user. We collect your email address to keep\r\nyou updated with operational information and news about our services and notify\r\nyou about security updates or any significant changes. Ogaworkman.com.ng shall\r\nsend her users service related notice when it is necessary to do so. For\r\ninstant, we will send you an email if our service is temporarily suspended for\r\nmaintenance. Generally, you may not opt-out of these communication , which are\r\nnot promotional in nature. However, if you do not wish to receive them, you\r\nhave the right to deactivate your account. We may as well use your information\r\nto contact you regarding your inquiry when issuing a customer support request\r\nto Ogaworkman.com.ng.  With your explicit\r\nconsent, we will periodically send you emails providing you with marketing\r\nadverts about our product and services that might be of value and interest to\r\nyou. You have the option to opt-out of these communication at anytime by\r\nclicking the unsubscribe</p>\r\n\r\n<p>link at the\r\nend of every email newsletter. But, if there are any technical issues with\r\nunsubscribing, do well to contact us: <a target=\"_blank\" rel=\"nofollow\">info@ogaworkman.com.ng</a> and we will gladly respond by solving the problem. </p>\r\n\r\n<p>We will use\r\nyour information to see if your job categories are suitable for the service\r\nrequest you have requested for, or in case of our products and services alerts sign-up,\r\nand we will add you to our database for future services request that may\r\nmatches your needs.</p>\r\n\r\n<p>When you\r\nsign-up to our service job alert, you are giving your consent for us to hold\r\nthis data as detailed. However, if you object to us holding your data on our\r\ndatabase, please advise immediately in writing to <a target=\"_blank\" rel=\"nofollow\">info@ogaworkman.com.ng</a> for us to remove your information from our system. </p>\r\n\r\n<p><b>Data Protection </b></p>\r\n\r\n<p>Ogaworkman.com.ng\r\nwill store all user data in a secure databases protected in a variety of\r\nindustry-standard access controls to assist in protecting your information.\r\nHence, no individual or organization can totally eliminate cyber security risks\r\nassociated with the transmission of personal data via online transactions, and\r\nyou only do so at your risk. We therefore provide the use of a secure server\r\nand implement different security measures for the safety of any personal data\r\nyou submit to Ogaworkman.com.ng. All essential and sensitive data such as\r\ncredit card details are stored on secure servers that are managed by\r\nOgaworkman.com.ng and our service providers. However, be sure to sign out when\r\nfinished using a share device (computer). At the end of any transaction, your\r\ncredit card details and other financial information are immediately deleted\r\nfrom our servers.</p>\r\n\r\n<p>&nbsp;<b>Privacy\r\nof Children </b></p>\r\n\r\n<p>The products\r\nand services of Ogaworkman.com.ng’s website are for people  who are at least 18years and above. If you\r\nare below the age of 18years, please do not give us your personal details or\r\nuse our website without the supervision of parent or guardians. At\r\nOgaworkman.com.ng, the children’s online Privacy Protection Act is complied\r\nwith and we encourage parents/guardians to thoroughly monitor their children’s\r\nuse of our website.</p>\r\n\r\n<p>&nbsp;<b>What About Cookies\r\n?</b></p>\r\n\r\n<p>Cookies are unique identifiers that will be transfer to the\r\nuser’s device to enable the service provider’s systems to recognize the user’s\r\ndevice and to provide features to make user’s navigation experience unique and\r\ntargeted. </p>\r\n\r\n<p>Cookies are tiny text files which identify user’s computer\r\nto the service provider’s server as a unique user when you visit certain pages\r\non the Site and they are stored by your Internet browser on your computer\'s\r\nhard drive. </p>\r\n\r\n<p>&nbsp;We uses Cookies to\r\nrecognize the user’s Internet Protocol address, saving you time while user are\r\non, or want to enter, the Site.  &nbsp;Cookies are use for user’s convenience in\r\nusing the Site for example to remember who you are when you want to amend your\r\nrequest without having to re-enter your email address. However, this will not\r\nunder any circumstances, affect your privacy or information security. Members\r\nwho disable all cookies will not be able to use the service, as some of them\r\nare essential to maintain your login to our website within a session. Hence,\r\nyou have the right to delete or block them by changing your browser settings at\r\nany point in time.</p>\r\n\r\n<p><b>Updates in Privacy Notice</b></p>\r\n\r\n<p>This Privacy\r\nPolicy is subject to review from time to time to stay up to date with the\r\ncurrent legal requirements. Nevertheless, for any significant changes on how\r\nOgaworkman.com.ng collect and use your person information you will be notify\r\nvia email, on the kind of data or the reasons for using your personal data on\r\nour website. For Updates regards to the collection and usage of your personal\r\ninformation, you will be asked to give your consent via email notification.\r\nHence, the updated version of our Privacy Policy will be upload on this page. </p>\r\n\r\n<p><b>Right To Your Personal Data </b></p>\r\n\r\n<p>You have the\r\nright to request for a copy of your personal data that we have anytime any day.\r\nIf you desire to do so, please contact us at Ogaworkman.com.ng and once your\r\nidentity is verified by our Technical Support Team, we will furnished you with\r\nan electronic copy of your personal data as soon as convenient within 72\r\nworking hours. The only case that we will not be able to grant you such right\r\nis when it turns to affecting the right and freedom of others. You have total\r\nright over any personal information you provide us and you can either change or\r\ndelete it at any time. Hence , to change your username log-in to our website\r\nand access your profile settings. You can as well request our support team to\r\nchange your email address whenever there is a need to do so. For now it is technically\r\ndifficult to do it all by yourself. </p>\r\n\r\n<p><b>Get Ready We Are Just a\r\nClick-Away</b></p>\r\n\r\n<p><b>Make your Service\r\nRequest Now</b></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n\r\n\r\n\r\n\r\n<br><b></b></h5><b></b></blockquote><b></b>', 'Privacy-policy', '2019-11-22', '2020-06-03'),
(3, 'Contact Us', '<p>No 34B Old Aba Road Rumubiokani, Port Harcourt</p>', 'Contact-us', '2019-11-22', '2020-03-23'),
(6, 'Terms & Conditions', '<h5></h5><p></p><p></p><p></p><p></p><p><b>Terms and Conditions</b></p>\r\n\r\n<p>1. &nbsp; &nbsp;\r\nTerms of use of the Ogaworkman\r\nplatform as located on the domain <a target=\"_blank\" rel=\"nofollow\" href=\"http://Ogaworkman.com.ng\">http://Ogaworkman.com.ng</a></p>\r\n\r\n<p>2. &nbsp; &nbsp;\r\nBy using the Ogaworkman Platform\r\nor receiving any services supplied to you by the Company (together with the\r\nwebsite located at Ogaworkman.com , and any telephonic messages sent, collectively, the\r\n\"Service\"), and downloading, installing or using any associated\r\nsoftware supplied by the Company which purpose is to enable you to use the\r\nService, you hereby expressly acknowledge and agree with Ogaworkman limited, a\r\nNigerian corporation (referred to in these terms of use as \"Ogaworkman\"\r\nor the \"Company\") to be bound by the terms and conditions of this\r\nusage policy (Ogaworkman Terms) and any future amendments and additions to\r\nthese Terms as published from time to time at <a target=\"_blank\" rel=\"nofollow\" href=\"http://www.Ogaworkman.com.ng/\">http://www.Ogaworkman.com.ng/</a></p>\r\n\r\n<p>3. &nbsp; &nbsp;\r\nThe Company reserves the right\r\nto modify the Ogaworkman Terms at any time, effective upon posting of an\r\nupdated version of the Ogaworkman Terms on the website. You are responsible for\r\nstaying up to date with the Terms. Continued use of the Ogaworkman Platform\r\nafter any changes to the terms shall constitute your consent to such changes.\r\nIf you require any more information or have any questions about our Ogaworkman\r\nTerms, please feel free to contact us by email at info@Ogaworkman.com.ng<a target=\"_blank\" rel=\"nofollow\"></a></p>\r\n\r\n<p>4. &nbsp; &nbsp;\r\nPlease read these Terms and\r\nConditions (“Terms”, “Terms and Conditions”) carefully before using the\r\n<a target=\"_blank\" rel=\"nofollow\" href=\"https://ogaworkman.com.ng\">https://ogaworkman.com.ng</a> website (the “Service”) operated by Ogaworkman &nbsp;(“us”, “we”, or “our”).</p>\r\n\r\n<p>5. &nbsp; &nbsp;\r\nYour access to and use of the\r\nService is conditioned on your acceptance of and compliance with these Terms.\r\nThese Terms apply to all visitors, users and others who access or use the\r\nService.</p>\r\n\r\n<p>6. &nbsp; &nbsp;\r\nBy accessing or using the\r\nService you agree to be bound by these Terms. If you disagree with any part of\r\nthe terms then you may not access the Service.</p>\r\n\r\n<p><b>7. &nbsp;\r\n</b><b>Operations</b></p>\r\n\r\n<p>Ogaworkman serves as a bridge between service providers and\r\nservice seekers and as such, are only responsible for services routed through\r\nthe company’s platform. Any job done with artisans from this platform outside\r\nthe knowledge and approval of the management of the company will be done at the\r\nrisk of the client. Payments are to be done with and directly to the company’s\r\naccount which will be advised after the job has been booked.</p>\r\n\r\n<p><b>8. &nbsp;\r\n</b><b>Accounts</b></p>\r\n\r\n<p>a. &nbsp; &nbsp; \r\nWhen you create an account with\r\nus, you must provide us information that is accurate, complete, and current at\r\nall times. Failure to do so constitutes a breach of the Terms, which may result\r\nin immediate termination of your account on our Service.</p>\r\n\r\n<p>b. &nbsp; &nbsp;\r\nYou are responsible for\r\nsafeguarding the password that you use to access the Service and for any\r\nactivities or actions under your password, whether your password is with our\r\nService or a third-party service.</p>\r\n\r\n<p>c. &nbsp; &nbsp; \r\nYou agree not to disclose your\r\npassword to any third party. You must notify us immediately upon becoming aware\r\nof any breach of security or unauthorized use of your account.</p>\r\n\r\n<p><b>9. &nbsp;\r\n</b><b>Termination</b></p>\r\n\r\n<p>a. &nbsp; &nbsp; \r\nWe may terminate or suspend\r\naccess to our Service immediately, without prior notice or liability, for any\r\nreason whatsoever, including without limitation if you breach the Terms.</p>\r\n\r\n<p>b. &nbsp; &nbsp;\r\nAll provisions of the Terms\r\nwhich by their nature should survive termination shall survive termination,\r\nincluding, without limitation, ownership provisions, warranty disclaimers,\r\nindemnity and limitations of liability.</p>\r\n\r\n<p>c. &nbsp; &nbsp; \r\nWe may terminate or suspend\r\nyour account immediately, without prior notice or liability, for any reason\r\nwhatsoever, including without limitation if you breach the Terms.</p>\r\n\r\n<p>d. &nbsp; &nbsp;\r\nUpon termination, your right to\r\nuse the Service will immediately cease. If you wish to terminate your account,\r\nyou may simply discontinue using the Service.</p>\r\n\r\n<p>e. &nbsp; &nbsp; \r\nAll provisions of the Terms\r\nwhich by their nature should survive termination shall survive termination,\r\nincluding, without limitation, ownership provisions, warranty disclaimers,\r\nindemnity and limitations of liability.</p>\r\n\r\n<p><b>10. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n</b><b>Governing Law</b></p>\r\n\r\n<p>a. &nbsp; &nbsp; \r\nThese Terms shall be governed\r\nand construed in accordance with the laws of Nigeria, without regard to its\r\nconflict of law provisions.</p>\r\n\r\n<p>b. &nbsp; &nbsp;\r\nOur failure to enforce any\r\nright or provision of these Terms will not be considered a waiver of those\r\nrights. If any provision of these Terms is held to be invalid or unenforceable\r\nby a court, the remaining provisions of these Terms will remain in effect.\r\nThese Terms constitute the entire agreement between us regarding our Service,\r\nand supersede and replace any prior agreements we might have between us\r\nregarding the Service.</p>\r\n\r\n<p><b>11. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n</b><b>Changes</b></p>\r\n\r\n<p>a. &nbsp; &nbsp; \r\nWe reserve the right, at our\r\nsole discretion, to modify or replace these Terms at any time. If a revision is\r\nmaterial we will try to provide at least 30 days notice prior to any new terms\r\ntaking effect. What constitutes a material change will be determined at our\r\nsole discretion.</p>\r\n\r\n<p>b. &nbsp; &nbsp;\r\nBy continuing to access or use\r\nour Service after those revisions become effective, you agree to be bound by\r\nthe revised terms. If you do not agree to the new terms, please stop using the\r\nService.</p>\r\n\r\n<p>12.<b>Contact Us</b></p>\r\n\r\n<p>If you have any questions about these Terms, please contact us.<b></b></p>\r\n\r\n\r\n\r\n\r\n\r\n<br><p></p><p></p><p></p><p></p>', 'Term-Condition', '2019-12-31', '2020-04-23'),
(8, 'Ogaworkman Professionals', '<b><h1><b>How\r\nWe Select Our Professionals</b></h1>\r\n\r\n</b>\r\n<p>We\r\nsearch far and wide to find the best professionals in Nigeria,\r\nthrough partnerships with professional associations and training\r\nschools, recommendations, and direct outreach. We interview, train,\r\nand do security screening for all our professionals.</p>\r\n<h2><b>How\r\nWe Manage Professionals</b><br></h2>\r\n<p>As\r\nan organization, we care deeply about all the Professionals in our\r\nsystem, and are constantly looking for ways to help them grow through\r\njobs and products we offer. We conduct trainings ourselves, and seek\r\ntraining partnerships where we can. We demand high standards from all\r\nOgaworkman Professionals, and they are all introduced to the\r\nOgaworkman Quality Standards at orientation. These standards required\r\nare not just excellent technical workmanship, but timeliness, good\r\ncommunication and other business skills.</p>\r\n<p>We\r\nhave a strict three strikes rule to remove Professionals from the\r\nsystem if they underperform. Professionals accused of serious\r\nmisconduct are immediately removed. \r\n</p>\r\n<h2><b>Rating\r\nProfessionals</b><br></h2>\r\n<p>To\r\nrate a Professional for their work; please use the rating request\r\nthat will be provided. Score their timeliness and communication\r\nskills, and to leave any additional comments. If a Professionals\r\nquality of work and/or professionalism is low please rate them\r\naccordingly and provide us with specific feedback in the comments\r\nsection.</p>\r\n<p>Ratings\r\nallow us to constantly improve our service delivery to you. We\r\nmonitor your feedback continuously and use them to grade the\r\nperformance of our professionals.</p>\r\n<h2><b>How\r\nto Become an Ogaworkman Professional</b></h2>\r\n<p> We\r\nare always looking for passionate, reliable, and qualified\r\nProfessionals.</p>\r\n<p>To\r\nbecome an Ogaworkman Professional, please register on the Ogaworkman\r\nwebsite. Do provide us with enough information on your specialty\r\nskills, and experience. Our team will follow up with you as soon as\r\nwe can.</p>\r\n<p>If\r\nyou know of a Professional who would be an excellent Ogaworkman\r\nProfessional please recommend a Professional here.</p>\r\n<h2><b>Requesting\r\na Job</b><br></h2>\r\n<h3><b>How\r\nit Works</b></h3>\r\n<ul>\r\n	<li>\r\n<p>\r\n	Fill\r\n	out the details of the service you need on the Ogaworkman website or\r\n	Mobile App and submit your request</p>\r\n	</li><li>\r\n<p>\r\n	We\r\n	revert to you with an invoice for the service requested between one\r\n	and three hours of making your request.</p>\r\n	</li><li>\r\n<p>\r\n	We\r\n	may schedule a site visit with ifnecessary.</p>\r\n	</li><li>\r\n<p>\r\n	You\r\n	make full payment to the Ogaworkman’s account on the website, the\r\n	payment is confirmed and your service will be delivered.</p>\r\n	</li><li>\r\n<p>\r\n	Rate\r\n	the Professional.</p>\r\n</li></ul>\r\n<h3><b>Urgent\r\nRequests</b></h3>\r\n<p>For\r\nvarious categories of jobs that may beurgent, kindly indicate the\r\nurgency to enable our team make sure you get an urgent assistance\r\nright away. \r\n</p>\r\n<p>However,\r\nkindly note that urgent jobs will attract an additional cost.</p>\r\n<h3><b>Request\r\nfor Customized Items</b></h3>\r\n<p>\r\nThe\r\nOgaworkman platform includes a wide variety of incredibly talented\r\ncarpenters, electricians,plumbers, and other Professionals that can\r\nbring your ideas and creations to life. Whether it’s a customized\r\npiece of furniture, a new outfit, or something even more unique we\'re\r\nhappy to help. To we provide the accurate service kindly make sureyou\r\nshare as many details as you can about what you\'re lookingfor.Some\r\nexamples of useful pieces of information are - pictures,\r\nmeasurements, material type, color, and other relevant\r\nspecifications.</p>\r\n<h3><b>Request\r\nfor Large/Sensitive Job</b><br></h3>\r\n<p>For\r\nlarge jobs such as home furnishing, renovations, minor construction,\r\nor unique creations - Ogaworkman has a dedicated project management\r\nteam led by terrific designers, construction managers, and engineers.\r\nBased on the size, scope or complexity of the request, we will assign\r\na relevant project manager.</p>\r\n<p>For\r\nvery large projects we have a set project management process\r\nincluding project phasing, dedicated supervisors, specialist\r\nfinishing teams etc. to ensure that the project goes well.</p>\r\n<p><b>Managing\r\na Request</b><br></p>\r\n<p><a target=\"_blank\" rel=\"nofollow\"></a>\r\nThe\r\nOgaworkman team is your best bet for all home and office maintenance\r\njobs. You make your job request on the Ogaworkman website or Mobile\r\napp and we will revert to you within one hour and at most three\r\nhours.</p>\r\n<h3><b>Site\r\nVisits</b><br></h3>\r\n<p>For\r\nsome requests that may require a Site Visit.  We recommend that you\r\nsuggest a mutually convenient time for the site visit.</p>\r\n<h2><b>Requesting\r\na Full-Time Professional.</b><br></h2>\r\n<h3><b>How\r\nit Works</b></h3>\r\n<p> For\r\nfull time Professionals</p>\r\n<ul>\r\n	<li>\r\n<p>\r\n	We\r\n	will agree on a monthly rate</p>\r\n	</li><li>\r\n<p>\r\n	You\r\n	will sign Ogaworkman\'s 3-month probationary contract</p>\r\n	</li><li>\r\n<p>\r\n	We\r\n	manage the probationary period and make sure the Professionals  are\r\n	doing their best</p>\r\n	</li><li>\r\n<p>\r\n	Payment\r\n	for the Professionals provided will be made each month  into\r\n	Ogaworkman’s account</p>\r\n	</li><li>\r\n<p>\r\n	Rate\r\n	the Professionals.</p>\r\n	</li><li>\r\n<p>\r\n	At\r\n	the end of the  satisfactory probationary period  you negotiate a\r\n	new contract with Ogaworkman</p>\r\n</li></ul>\r\n<h3><b>Managing\r\na Full-Time Request</b><br></h3>\r\n<p>All\r\nfull-time requests begin on a 3 month probationary period through\r\nOgaworkman. The Ogaworkman team is always on hand to manage a job,\r\nduring the probationary period.</p>\r\n<h3><b>Cost\r\nfor Full-Time Professionals</b><br></h3>\r\n<p>We’re\r\ncommitted to making sure, that full time Professionals provided,truly\r\nwork. That’s why we use a pricing model that is tailored to our\r\nefforts to build a long-lasting relationship. Each month, Ogaworkman\r\nwill send an invoice for the full-time Professional’s monthly\r\nsalary + 10% Ogaworkman service fee. \r\n</p>\r\n<h3><b>Probationary\r\nPeriod</b><br></h3>\r\n<p>We\r\nhave set up a 3 months probationary period where we stay involved to\r\nset the relationship off on the right foot. Our management team will\r\ncheck in with the Professionals on a weekly basis to create work\r\nplans, organize schedules, and find other ways to ensure a good fit.\r\nThey will also check in with you at pre-determined times to see how\r\nthe relationship is developing and what more can be done to help\r\nimprove the relationship.</p>\r\n<p>If\r\nat any time during the probationary period you have a problem or are\r\nunhappy with a Professional that you are working with, you can\r\ncontact the assigned Ogaworkman manager who can help you resolve the\r\nissue or replace the professional.</p>\r\n<h3><b>How\r\nPricing Works</b><br></h3>\r\n<p>An\r\ninvoice for the services rendered for the month will be sent to you.</p>\r\n<h3><b>How\r\nto Make Payments</b></h3>\r\n<p>Payments\r\nare made to Ogaworkman’s account before the end of the month for\r\nthe services provided.</p>\r\n<h3><b>Payment\r\nConfirmation &amp; VAT</b></h3>\r\n<p>After\r\na payment is received you will receive a \"Payment Confirmation\"\r\nvia email or your phone. The payment confirmation email or alert\r\nserves as a receipt of payment, confirming the exact amount that was\r\nreceived.</p>\r\n<p>Ogaworkman\r\nis required by law to pay VAT on the service fee that we charge (7.5%\r\nof the total value of the job). This 7.5% VAT is included in the\r\nservice fee and is not charged as an extra cost to you.</p>\r\n<h3><b>Rating\r\nProfessionals</b><br></h3>\r\n<p>For\r\nthe full time professionals their rating will be monthly.</p>\r\n<p>To\r\nrate a Professional for their work, please use the rating request that\r\nwill be provided. Score their timeliness and communication skills,\r\nand to leave any additional comments. If a Professionals quality of\r\nwork and/or professionalism is low please rate them accordingly and\r\nprovide us with specific feedback in the comments section.</p>\r\n<p>Ratings\r\nallows us to constantly improve our service delivery to you. We\r\nmonitor your feedback continuously and use them to grade the\r\nperformance of our professionals.</p>\r\n<p><b><br></b></p><h2><b>Problems\r\n&amp; Complaints</b><br></h2>\r\n<h3><b>Problem\r\nwith our Professionals.</b></h3>\r\n<p>Any\r\nissue involving the misconduct of our professionals should be\r\ncommunicated to the Ogaworkman Customer Care line and it will be\r\nresolved appropriately.</p>\r\n<h3><b>Cancellation\r\nPolicy</b><br></h3>\r\n<p>We\r\nare aware that schedules change, and Ogaworkman allows you to easily\r\nreschedule a job request within an agreed time frame. You can\r\nreschedule the job by calling the Ogaworkman office</p>\r\n<h3><b>Warranties &amp; Guarantees</b><br></h3>\r\n<p>As\r\na company, we’re committed to making sure that every job is\r\ncompleted to clients’ satisfaction. However, if a job is not\r\ncompleted to the agreed specifications, simply send a mail to the\r\nOgaworkman’s email within 24 hours or call the Customer Care line,\r\nand our job management team will work with the professional to\r\naddress any outstanding issues.  \r\n</p>\r\n<p>In\r\nsome cases, we provide newly procured parts. If you experience a\r\nrelated problem during the warranty period, let us know by sending an\r\nemail to the Ogaworkman office  or calling the Customer Care line and\r\nour team will coordinate with the professional to fix the issue at\r\nthe earliest mutually convenient date.</p><h3><b>Joining our Professionals.</b></h3><p>Are you a professional? An Artisan and you desire to join our teaming group of service providers? Please take this link and sign up and we shall contact you in a short while.</p>', 'Ogaworkman-Professionals', '2020-01-22', '2020-06-02'),
(9, 'Why choose Ogaworkman?', 'Getting\r\nour home maintenance services can be a drag, we look for plumbers\r\nfrom the plumbers shed, electricians at their workshops, and painters\r\nacross the streets.\r\n<p>We\r\nleave our homes in disrepair because we are too busy and sometimes we\r\ncan’t find the right artisans.</p>\r\n<p>At\r\nOgaworkman we understand, so we offer our services to you to help\r\nmaintain your homes and offices. We also work with you on your new\r\nbuilding projects etc.</p>\r\n<p>From\r\nthe comfort of your home and offices we really are just a click away.</p>\r\n<p>We\r\nprovide an online platform with hundreds of trained and certified\r\nartisans to meet your everyday home services needs.</p>\r\n<p>We\r\nbring comfort, convenience and joy repairing, installing and engaging\r\nwith you on your new building projects.</p>\r\n<p>We\r\nalso provide up to N100, 000.00 Insurance cover for damages.</p>', 'Why_Choose', '2020-01-22', '2020-01-22'),
(11, 'How does it work?', '<div><b>It’s simple! </b><br></div><div>    • Log on to ogaworkman.com.ng <br></div><div>    • Select service required</div><div>\r\n    • Indicate sub category required <br></div><div>• Upload pictures of what is to be repaired if necessary</div><div>\r\n    • Click  proposed date and time</div><div>\r\n    • Indicate address. <br></div><div>    • Click send</div><div>\r\n    • Ogaworkman gets back to you on price</div><div>\r\n    • E copy of Invoice sent <br></div><div>    • Payment Made <br></div><div>    • Job allocated to service man/woman <br></div><div>    • Service Delivered</div><div>\r\n    • Quality of Job confirmed by Customer Service and Quality Assurance officer</div><div>\r\n    • Appraisal of Ogaworkman Artisan</div><div>\r\n    • Request for referral. <br></div><div><br></div><div><b>The Ogaworkman Advantage</b></div><div>\r\n    1. Trained, certified and Police Screened Artisans <br></div><div>2. Insurance cover up to N100,000 <br></div><div>3. Speed of Service delivery <br></div><div>4. Book jobs from the comfort of your home or office.</div>', 'howitwork', '2020-01-23', '2020-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `title`, `slug`, `subject`, `message`, `status`, `is_delete`, `updated_at`, `created_at`) VALUES
(1, 'Forgot Password', 'Forgot-password', 'Forgot Password!!!!', '<p></p><p></p>\r\n<p>Dear {name}</p><p>You have request for reset your password.<br>{link} <br><br>Thanks,<br></p><p><strong>( Please do not reply to this email )</strong></p><br><p><strong></strong></p><p></p>', 1, 0, '2019-12-30 13:58:11', '2019-02-12 14:57:35'),
(2, 'email verification', 'email_verification', 'Email verification!!', '<p>Dear {name}</p>\r\n<p>\r\nyou have receive email for verify email.</p><p>{link}</p><p></p><p>Thanks,</p><p><strong>( Please do not reply to this email )</strong></p><br><p></p>', 1, 0, '2019-12-16 09:16:44', '2019-12-11 19:04:39'),
(5, 'Enquiry Reply', 'Enquiry-reply', 'Enquiry Reply!!', '<p>Dear {name}</p>\r\n<p>\r\nyou have receive email for your enquiry.</p><p>{link}</p><p></p><p>Thanks,</p><p><strong></strong></p><br><p></p>', 1, 0, '2020-01-25 00:00:00', '2020-01-25 00:00:00'),
(6, 'Successfully registration', 'sucessfully-registration', 'Successfully registration.....', '<p>Dear {name}</p>\r\n\r\n<p>You been successfully registration.</p><p>Thanks,</p><p><strong>( Please do not reply to this email )</strong></p><br><p></p>', 1, 0, '2020-03-06 10:40:20', '2020-03-06 10:40:20'),
(7, 'Service start confirmation', 'service_start_confirmation', 'Confirm start of service', '<p></p><h3><small></small></h3><p></p><p></p><h4><b><small></small></b><b></b>Dear {name},<b></b><b></b><b></b></h4><p><b>{provider_name}</b> has started your service <b>{service_name}</b>. Please click on link below to confirm.</p><p>{link}</p><p>Thanks</p><p>(Please do not reply to this mail)</p><p></p>', 1, 0, '2020-03-07 12:08:55', '2020-03-07 12:33:44'),
(8, 'Service end confirmation', 'service_end_confirmation', 'Confirm end of service', '<p></p><h3><small></small></h3><p></p><p></p><h4><b><small></small></b><b></b>Dear {name},<b></b><b></b><b></b></h4><p><b>{provider_name}</b> has finished your service <b>{service_name}</b>. Please click on link below to confirm.</p><p>{link}</p><p>Thanks</p><p>(Please do not reply to this mail)</p><p></p>', 1, 0, '2020-03-07 12:08:55', '2020-03-07 12:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `message` text,
  `reply` text,
  `reply_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 =not replied 1= replied',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `name`, `email`, `message`, `reply`, `reply_status`, `created_at`, `updated_at`) VALUES
(1, 'dfewewrtr', 'asssn@gmail.com', 'rewrr ewrewr rewrewr', '<p>ok<br></p>', 1, '2020-01-02 09:20:51', '2020-01-02 03:50:51'),
(2, 'de ewr', 'dsfdfdadmin@gmail.com', 'dewdewqd ewdfwd', '<p>fgfgfg<br></p>', 1, '2020-01-02 07:23:27', '2020-01-02 01:53:27'),
(3, 'frdesf', 'fdsfdsfdsffsdfds@gmail.com', 'fefewffewf', '<p>fddfgdsf<br></p>', 1, '2020-01-02 07:13:12', '2020-01-02 01:43:12'),
(14, 'ooooooooooooo', 'ogaworkman@getnada.com', 'oooooooooooooooo', '<p>oooooooooooooooooooooo<br></p>', 1, '2020-01-02 09:33:28', '2020-01-02 04:03:28'),
(15, 'xxxxxxx', 'xibuxo@getnada.com', 'xxxxxxxxxxxxx', '<h2><b>hgfhgfhgfhgf</b>hh gfhgfh<b>gfhfghfgh<i>h&nbsp;&nbsp;&nbsp; ghgfhgfhghg <u>ghhghghhfghgf hhhhhhhhhhhhhhhhhhhhhhhhhhh&nbsp;&nbsp;&nbsp; htghhhhhhh hfgh<small>hh hghhhhhhhhhhhhhhhhhhhh</small></u></i></b></h2><div>gggggggggggggggggggggggggggggg</div><div><b>ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg</b></div><div><b>g<small>ggggggggggggggggggggggggggggggggggggggggggg</small></b><br></div><br><br><br><br><br><br><br><br>', 1, '2020-01-02 09:32:21', '2020-01-02 04:02:21'),
(16, 'wqqw', 'wqddwq@gmail.com', 'wqdwqdwq', NULL, 0, '2020-01-02 04:25:57', '2020-01-02 04:25:57'),
(17, '11111111', '111@gmail.com', '1`11 1111111111111111111111111', '<p>hh<br></p>', 1, '2020-01-02 04:30:19', '2020-01-02 04:34:27'),
(18, 'werwer', 'send@getnada.com', 'fsdsend@getnada.com', '<p>&nbsp;ehruiewr frst<br></p>', 1, '2020-01-02 06:03:13', '2020-04-09 05:41:46'),
(19, 'eeeeeeeeee', 'send@getnada.com', 'errrrrrrrrrrrrrrrr', '<p>qqqqqqqqqqqqqq<br></p>', 1, '2020-01-02 06:04:23', '2020-01-02 06:05:18'),
(20, 'rytytry', 'user@getnaga.com', 'rytry6trytryt', NULL, 0, '2020-01-25 01:11:16', '2020-01-25 01:11:16'),
(21, 'tester', 'test@getnada.com', 'asdasdsad', '<p><u><b><i>sadasdasasdsa</i></b></u></p>', 1, '2020-02-21 08:36:06', '2020-02-25 01:36:50'),
(22, 'Praveen parking', 'kahawa@getnada.com', 'dfsdfsdfdsfdsfdsf tets', '<p>test my messgae</p>', 1, '2020-02-21 08:44:46', '2020-02-21 08:45:16'),
(23, 'Branch AAC', 'dfsdf@getnada.ovm', 'kjbaksjbdkjasbdsda sasd asd sadas dasd asdasdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '<p>dadafdsasad</p>', 1, '2020-02-25 01:35:17', '2020-02-25 01:35:54'),
(24, 'Demas', 'ademas@dbello.net', 'What forms of ID do I need to sign up?', NULL, 0, '2020-03-01 13:19:40', '2020-03-01 13:19:40'),
(25, 'erer', 'admin@gmail.com', 'eeeeeeeerrrrr', '<p>ghhvv<br></p>', 1, '2020-03-20 01:01:14', '2020-04-09 05:35:55'),
(26, 'Ugochukwu Nwaogu', 'ugodestiny2008@yahoo.com', 'pls tell us about ogaworknan', '<p>dear ustoer with regards to youryt request</p>', 1, '2020-06-02 05:54:28', '2020-06-02 06:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text,
  `answer` text NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'active=0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Who are we?', '<p><b>Ogaworkman.com\r\nis an online platform that partners with Nigerian artisans to\r\nfacilitate and manage the provision of artisan services to the\r\nNigerian populace at premium quality control, effectively regulated,\r\ntimely and at good bargain price. We are the go-to organization for\r\nhome and office maintenance services.  Additionally, we provide\r\nwell-trained and pre-qualified artisan staffing solution to\r\nindividuals and businesses requiring artisans to work along sides\r\nwith them whether at construction sites, factories, offices and\r\nhomes, for short-term or long-term projects and works.</b>\r\n\r\n<br></p>', 0, 0, '2020-01-22 12:08:49', '2020-01-22 06:38:49'),
(9, 'Locations Available', '<p>Currently\r\nOgaworkman services are available in Port Harcourt and will soon be\r\nin Lagos and Abuja and other locations across Nigeria and Africa.. If\r\nyou have a request outside Port Harcourt please send us an email with\r\nthe details and location of your job and we\'ll do our best to\r\naccommodate your request</p>\r\n\r\n<br><p></p>', 0, 0, '2020-01-22 12:10:00', '2020-01-22 06:40:00'),
(10, 'Services Available', '<b></b><p><b></b></p><p><b><b>We\r\nhave a rich crop of professionals in over 20 Categor</b>ies<b>\r\nof</b>\r\n<b>services\r\nfor home and office maintenance service needs. Our</b>\r\ncategories of services include<b>\r\nbut not limited to Plumbing, Carpentry,</b>\r\n<b>etc</b>.</b></p><b>\r\n\r\n</b><p></p><b><small></small></b>\r\n\r\n<br><br><br>', 0, 0, '2020-01-22 12:17:19', '2020-01-22 06:47:19'),
(11, 'How Pricing Works ?', '<p>An\r\ninvoice covering the services required will be sent to you. \r\n\r\n</p><p>A\r\n100% down payment is made before the commencement of the required\r\njob.</p>\r\n\r\n<br><p></p>', 0, 0, '2020-01-22 06:42:03', '2020-01-22 06:42:03'),
(12, 'Making a Job Request.', '<p>Job\r\nrequest can be made by visiting our website:<a target=\"_blank\" rel=\"nofollow\" href=\"http://www.ogaworkman.com.ng\">www.ogaworkman.com.ng</a> or\r\nby downloading our mobile app on google play store. \r\n\r\n\r\n<br></p>', 0, 0, '2020-01-22 06:42:50', '2020-01-22 06:42:50'),
(13, 'Hours of Operations ?', '<p>When requesting a job kindly indicate what time you will be available to enable us deliver the service. The Ogaworkman team hours of operations are Monday through Friday between 8am and 5pm, Saturday between 10am and 5pm, and Sunday from midday to 4pm. However, service requests after our official working hours will treated as ‘urgent requests’ and will attract extra charges.<br></p>', 0, 0, '2020-01-22 06:43:21', '2020-01-22 06:43:21'),
(14, 'Warranties & Guarantees ?', '<p>As a company, we’re committed to making sure that every job is completed to clients’ satisfaction. However, if a job is not completed to the agreed specifications, simply send a mail to the Ogaworkman’s email within 24 hours or call the Customer Care line, and our job management team will work with the professional to address any outstanding issues.  <br>In some cases, we provide newly procured parts. If you experience a related problem during the warranty period, let us know by sending an email to the ogaworkman office  or calling the Customer Care line and our team will coordinate with the professional to fix the issue at the earliest mutually convenient date.<br></p>', 0, 0, '2020-01-22 06:44:17', '2020-01-22 06:44:17'),
(15, 'Press Inquiries ?', '<p><b><i><u></u></i><u><i></i></u><i></i><u></u><i><u></u></i></b><i><u></u></i>If you are a member of the press and are interested in learning more about our company, or the incredible Professionals on the Ogaworkman platform, we’d love to hear from you! Please direct all inquiries to info@ogaworkman.com.ng<b><i></i><i></i></b><br></p>', 0, 0, '2020-02-27 11:24:10', '2020-02-27 05:54:10'),
(16, 'Press Inquiries ?', '<p>\r\n\r\nPress Inquiries ?\r\n\r\n<br></p><p>\r\n\r\nPress Inquiries ?\r\n\r\n<br></p><p>\r\n\r\nPress Inquiries ?\r\n\r\n<br></p><p>\r\n\r\nPress Inquiries ?\r\n\r\n<br></p>', 1, 0, '2020-02-25 07:48:15', '2020-02-25 02:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `global_setting`
--

CREATE TABLE `global_setting` (
  `id` int(11) NOT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `email` varchar(222) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_person_name` varchar(222) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `pinterest` varchar(70) DEFAULT NULL,
  `facebook` varchar(60) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(70) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `logo` varchar(255) DEFAULT NULL,
  `copyright` varchar(70) DEFAULT NULL,
  `favicon` varchar(233) NOT NULL,
  `vat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `global_setting`
--

INSERT INTO `global_setting` (`id`, `phone_no`, `email`, `address`, `contact_person_name`, `created_at`, `updated_at`, `pinterest`, `facebook`, `instagram`, `twitter`, `title`, `content`, `logo`, `copyright`, `favicon`, `vat`) VALUES
(1, '8187759077', 'Ogaworkman@gmail.com', '34 OLD ABA ROAD, RUMUOBIAKANNI', 'AKIN-LONGE, OJO ESHOVO', '0000-00-00', '2020-04-09', 'http://www.pinterest.com', 'https://web.facebook.com/Ogaworkman-100697304751132/', 'http://instagram.com/ogaworkman/', 'http://twitter.com/ogaworkman', 'Ogaworkman', 'At Ogaworkman, we understand, so we offer our services to you to help maintain your homes and offices. We also work with you on your new building projects and installations.', '1966284920.png', 'Copyright © 2019-2020 OgaWorkman. All rights reserved.', '998174852.jpg', '12');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Port Harcourt', 0, 0, '2020-04-21 11:51:55', '2020-04-21 06:21:55'),
(2, 'Lagos', 0, 0, '2020-03-23 09:52:04', '2020-03-23 04:22:04'),
(3, 'Abuja', 0, 0, '2020-03-23 09:52:18', '2020-03-23 04:22:18'),
(4, 'Owerri', 0, 0, '2020-04-21 11:51:42', '2020-04-21 06:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` tinyint(11) NOT NULL COMMENT '1=>service_booking(provider), 2=>service_ assigned(provider), 3=>service start confirmed by customer(customer), 4=> service end confirmed by customer(customer), 5=>price updated(customer), 6=>provider assigned(customer)',
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `is_read` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0->not_read, 1->read',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0',
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_read`, `is_delete`, `data`, `created_at`, `updated_at`) VALUES
(12, 1, 221, 'End confirmation', 'user has confirmed end of PLUMBING SERVICES', 0, 0, '{\"id\":11,\"service_booking_id\":108,\"start_at_provider\":\"2020-03-19 12:12:40\",\"end_at_provider\":\"2020-03-19 12:14:50\",\"ack_start\":\"2020-03-19 12:13:28\",\"ack_end\":\"2020-03-19 12:14:53\",\"service_status\":4,\"created_at\":\"2020-03-19 17:44:50\",\"updated_at\":\"2020-03-19 12:14:53\"}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(13, 2, 221, 'Service Assigned', 'You have been assigned a service APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 0, 0, '{\"id\":109,\"date\":\"03\\/19\\/2020 - 03\\/19\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"tests\",\"image\":\"2079791363.jpg\",\"user_id\":160,\"service_id\":71,\"payment_type\":null,\"status\":4,\"assign_provider\":\"221\",\"price\":\"364\",\"extra_information\":null,\"sub_category\":\"18,19\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"3453345\",\"created_at\":\"2020-03-19 12:19:54\",\"updated_at\":\"2020-03-19 12:22:31\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(11, 1, 221, 'Start confirmation', 'useruser has confirmed start of PLUMBING SERVICES', 0, 0, '{\"id\":11,\"service_booking_id\":108,\"start_at_provider\":\"2020-03-19 12:12:40\",\"end_at_provider\":null,\"ack_start\":\"2020-03-19 12:13:28\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-19 17:42:40\",\"updated_at\":\"2020-03-19 12:13:28\"}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(9, 1, 218, 'End confirmation', 'user has confirmed end of PLUMBING SERVICES', 0, 0, '{\"id\":10,\"service_booking_id\":107,\"start_at_provider\":\"2020-03-19 11:27:55\",\"end_at_provider\":\"2020-03-19 11:55:22\",\"ack_start\":\"2020-03-19 11:28:22\",\"ack_end\":\"2020-03-19 11:56:58\",\"service_status\":4,\"created_at\":\"2020-03-19 17:25:22\",\"updated_at\":\"2020-03-19 11:56:58\"}', '2020-03-19 11:57:18', '2020-03-19 06:27:18'),
(10, 2, 221, 'Service Assigned', 'You have been assigned a service PLUMBING SERVICES', 0, 0, '{\"id\":108,\"date\":\"03\\/19\\/2020 - 03\\/19\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"GGSIPU, Sector 16 C, Dwarka, Delhi, India\",\"additional_information\":\"rtrtrtrtr\",\"image\":\"1663035693.jpeg\",\"user_id\":160,\"service_id\":72,\"payment_type\":null,\"status\":4,\"assign_provider\":\"221\",\"price\":\"180\",\"extra_information\":null,\"sub_category\":\"27\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"4545455\",\"created_at\":\"2020-03-19 12:09:19\",\"updated_at\":\"2020-03-19 12:11:49\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(8, 1, 218, 'Start confirmation', 'useruser has confirmed start of PLUMBING SERVICES', 0, 0, '{\"id\":10,\"service_booking_id\":107,\"start_at_provider\":\"2020-03-19 11:27:55\",\"end_at_provider\":null,\"ack_start\":\"2020-03-19 11:28:22\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-19 16:57:55\",\"updated_at\":\"2020-03-19 11:28:22\"}', '2020-03-19 11:57:18', '2020-03-19 06:27:18'),
(7, 2, 218, 'Service Assigned', 'You have been assigned a service PLUMBING SERVICES', 0, 0, '{\"id\":107,\"date\":\"03\\/19\\/2020 - 03\\/19\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"TESTES\",\"image\":\"1328927716.png\",\"user_id\":160,\"service_id\":72,\"payment_type\":null,\"status\":4,\"assign_provider\":\"218\",\"price\":\"876\",\"extra_information\":null,\"sub_category\":\"24,25,26\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"345345345\",\"created_at\":\"2020-03-19 11:19:27\",\"updated_at\":\"2020-03-19 11:21:10\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0}', '2020-03-19 11:57:18', '2020-03-19 06:27:18'),
(14, 1, 221, 'Start confirmation', 'useruser has confirmed start of APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 0, 0, '{\"id\":12,\"service_booking_id\":109,\"start_at_provider\":\"2020-03-19 12:30:44\",\"end_at_provider\":null,\"ack_start\":\"2020-03-19 12:31:02\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-19 18:00:44\",\"updated_at\":\"2020-03-19 12:31:02\"}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(15, 1, 221, 'End confirmation', 'user has confirmed end of APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 0, 0, '{\"id\":12,\"service_booking_id\":109,\"start_at_provider\":\"2020-03-19 12:30:44\",\"end_at_provider\":\"2020-03-19 12:38:52\",\"ack_start\":\"2020-03-19 12:31:02\",\"ack_end\":\"2020-03-19 12:39:40\",\"service_status\":4,\"created_at\":\"2020-03-19 18:08:52\",\"updated_at\":\"2020-03-19 12:39:40\"}', '2020-03-19 12:39:55', '2020-03-19 07:09:55'),
(16, 2, 223, 'Service Assigned', 'You have been assigned a service ELECTRICAL SERVICES', 1, 0, '{\"id\":111,\"date\":\"03\\/20\\/2020 - 03\\/20\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Jaipur, Rajasthan, India\",\"additional_information\":\"test gud sdsdj jsdjsb sdsd  ddwewe\",\"image\":\"765478597.png\",\"user_id\":224,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"223\",\"price\":\"314\",\"extra_information\":null,\"sub_category\":\"10\",\"mobile_no\":\"72347272\",\"whatsapp_no\":\"7975906466\",\"created_at\":\"2020-03-20 10:18:28\",\"updated_at\":\"2020-03-20 10:24:07\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0}', '2020-03-20 10:35:32', '2020-04-18 14:04:19'),
(17, 1, 223, 'Start confirmation', 'Testuser has confirmed start of ELECTRICAL SERVICES', 1, 0, '{\"id\":13,\"service_booking_id\":111,\"start_at_provider\":\"2020-03-20 10:30:37\",\"end_at_provider\":null,\"ack_start\":\"2020-03-20 10:31:19\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-20 16:00:37\",\"updated_at\":\"2020-03-20 10:31:19\"}', '2020-03-20 10:35:32', '2020-04-18 14:04:19'),
(18, 1, 223, 'End confirmation', 'Test has confirmed end of ELECTRICAL SERVICES', 1, 0, '{\"id\":13,\"service_booking_id\":111,\"start_at_provider\":\"2020-03-20 10:30:37\",\"end_at_provider\":\"2020-03-20 10:32:51\",\"ack_start\":\"2020-03-20 10:31:19\",\"ack_end\":\"2020-03-20 10:33:10\",\"service_status\":4,\"created_at\":\"2020-03-20 16:02:51\",\"updated_at\":\"2020-03-20 10:33:10\"}', '2020-03-20 10:35:32', '2020-04-18 14:04:19'),
(19, 2, 210, 'Service Assigned', 'You have been assigned a service AIR CONDITIONER INSTALLATION AND MAINTENANCE SERVICES', 1, 0, '{\"id\":112,\"date\":\"03\\/20\\/2020 - 03\\/20\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"tests\",\"image\":\"696896694.jpg\",\"user_id\":160,\"service_id\":76,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"20866\",\"extra_information\":null,\"sub_category\":\"152,153,154,155,156\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"3435354\",\"created_at\":\"2020-03-20 14:02:43\",\"updated_at\":\"2020-03-20 14:06:20\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/20\\/2020 \",\" 03\\/20\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":160,\"name\":\"user\"}}', '2020-03-20 14:07:55', '2020-04-08 09:35:39'),
(20, 1, 210, 'Start confirmation', 'useruser has confirmed start of AIR CONDITIONER INSTALLATION AND MAINTENANCE SERVICES', 1, 0, '{\"id\":14,\"service_booking_id\":112,\"start_at_provider\":\"2020-03-20 14:07:15\",\"end_at_provider\":null,\"ack_start\":\"2020-03-20 14:07:34\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-20 19:37:15\",\"updated_at\":\"2020-03-20 14:07:34\"}', '2020-03-20 14:07:55', '2020-04-08 09:35:39'),
(21, 1, 210, 'Start confirmation', 'useruser has confirmed start of AIR CONDITIONER INSTALLATION AND MAINTENANCE SERVICES', 1, 0, '{\"id\":14,\"service_booking_id\":112,\"start_at_provider\":\"2020-03-20 14:07:15\",\"end_at_provider\":null,\"ack_start\":\"2020-03-20 14:17:28\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-20 19:45:05\",\"updated_at\":\"2020-03-20 14:17:28\"}', '2020-03-20 08:47:29', '2020-04-08 09:35:39'),
(22, 1, 210, 'End confirmation', 'user has confirmed end of AIR CONDITIONER INSTALLATION AND MAINTENANCE SERVICES', 1, 0, '{\"id\":14,\"service_booking_id\":112,\"start_at_provider\":\"2020-03-20 14:07:15\",\"end_at_provider\":\"2020-03-20 14:34:46\",\"ack_start\":\"2020-03-20 14:17:28\",\"ack_end\":\"2020-03-20 14:34:59\",\"service_status\":4,\"created_at\":\"2020-03-20 20:04:46\",\"updated_at\":\"2020-03-20 14:34:59\"}', '2020-03-20 09:05:10', '2020-04-08 09:35:39'),
(23, 2, 210, 'Service Assigned', 'You have been assigned a service APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 1, 0, '{\"id\":113,\"date\":\"03\\/21\\/2020 - 03\\/21\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Jaipur Railway Station Main Entry, Gopalbari, Jaipur, Rajasthan, India\",\"additional_information\":\"Hello Test\",\"image\":\"254064903.jpg\",\"user_id\":160,\"service_id\":71,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"190\",\"extra_information\":null,\"sub_category\":\"16,18,20,22\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"55446546\",\"created_at\":\"2020-03-21 15:04:17\",\"updated_at\":\"2020-03-21 15:06:13\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/21\\/2020 \",\" 03\\/21\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":160,\"name\":\"user\"}}', '2020-03-21 09:36:19', '2020-04-08 09:35:39'),
(24, 1, 210, 'Start confirmation', 'useruser has confirmed start of APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 1, 0, '{\"id\":15,\"service_booking_id\":113,\"start_at_provider\":\"2020-03-21 15:08:40\",\"end_at_provider\":null,\"ack_start\":\"2020-03-21 15:09:54\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-21 20:38:40\",\"updated_at\":\"2020-03-21 15:09:54\"}', '2020-03-21 09:40:00', '2020-04-08 09:35:39'),
(25, 1, 210, 'End confirmation', 'user has confirmed end of APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 1, 0, '{\"id\":15,\"service_booking_id\":113,\"start_at_provider\":\"2020-03-21 15:08:40\",\"end_at_provider\":\"2020-03-21 15:10:34\",\"ack_start\":\"2020-03-21 15:09:54\",\"ack_end\":\"2020-03-21 15:11:07\",\"service_status\":4,\"created_at\":\"2020-03-21 20:40:34\",\"updated_at\":\"2020-03-21 15:11:07\"}', '2020-03-21 09:41:13', '2020-04-08 09:35:39'),
(26, 1, 210, 'End confirmation', 'user has confirmed end of APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 1, 0, '{\"id\":15,\"service_booking_id\":113,\"start_at_provider\":\"2020-03-21 15:08:40\",\"end_at_provider\":\"2020-03-21 15:10:34\",\"ack_start\":\"2020-03-21 15:09:54\",\"ack_end\":\"2020-03-21 15:11:09\",\"service_status\":4,\"created_at\":\"2020-03-21 20:41:07\",\"updated_at\":\"2020-03-21 15:11:09\"}', '2020-03-21 09:41:15', '2020-04-08 09:35:39'),
(27, 2, 218, 'Service Assigned', 'You have been assigned a service PLUMBING SERVICES', 0, 0, '{\"id\":116,\"date\":\"03\\/25\\/2020 - 03\\/25\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI\",\"additional_information\":\"Fix leaking taps.\",\"image\":\"574696026.jpg\",\"user_id\":206,\"service_id\":72,\"payment_type\":null,\"status\":4,\"assign_provider\":\"218\",\"price\":null,\"extra_information\":null,\"sub_category\":\"24,25\",\"mobile_no\":\"08187759009\",\"whatsapp_no\":\"08187759009\",\"created_at\":\"2020-03-25 08:29:27\",\"updated_at\":\"2020-03-25 11:59:48\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/25\\/2020 \",\" 03\\/25\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":206,\"name\":\"Akin Longe Ojo Eshovo\"}}', '2020-03-25 06:29:54', '2020-03-25 06:29:54'),
(28, 2, 201, 'Service Assigned', 'You have been assigned a service APPLIANCE MAINTENANCE, REPAIRS AND INSTALLATION.', 0, 0, '{\"id\":119,\"date\":\"03\\/25\\/2020 - 03\\/25\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"r5e4634546\",\"image\":null,\"user_id\":160,\"service_id\":71,\"payment_type\":null,\"status\":4,\"assign_provider\":\"201\",\"price\":null,\"extra_information\":null,\"sub_category\":\"21\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"464364534\",\"created_at\":\"2020-03-25 11:40:49\",\"updated_at\":\"2020-03-25 12:16:36\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/25\\/2020 \",\" 03\\/25\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":160,\"name\":\"user\"}}', '2020-03-25 06:46:42', '2020-03-25 06:46:42'),
(29, 2, 223, 'Service Assigned', 'You have been assigned a service ELECTRICAL SERVICES', 1, 0, '{\"id\":115,\"date\":\"03\\/25\\/2020 - 03\\/25\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"26 Bori Road\",\"additional_information\":\"Fix sockets.\",\"image\":\"690011785.png\",\"user_id\":206,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"223\",\"price\":null,\"extra_information\":null,\"sub_category\":\"10,11\",\"mobile_no\":\"08187759009\",\"whatsapp_no\":\"08187759009\",\"created_at\":\"2020-03-25 08:24:45\",\"updated_at\":\"2020-03-26 13:27:47\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/25\\/2020 \",\" 03\\/25\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":206,\"name\":\"Akin Longe Ojo Eshovo\"}}', '2020-03-26 07:57:58', '2020-04-18 14:04:19'),
(30, 2, 223, 'Service Assigned', 'You have been assigned a service FACILITIES MANAGEMENT', 1, 0, '{\"id\":121,\"date\":\"03\\/25\\/2020 - 03\\/25\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"26 Bori Road\",\"additional_information\":\"ht ba\",\"image\":null,\"user_id\":206,\"service_id\":93,\"payment_type\":null,\"status\":4,\"assign_provider\":\"223\",\"price\":null,\"extra_information\":null,\"sub_category\":\"144\",\"mobile_no\":\"08187759009\",\"whatsapp_no\":\"08187759009\",\"created_at\":\"2020-03-25 12:58:32\",\"updated_at\":\"2020-03-26 17:49:58\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/25\\/2020 \",\" 03\\/25\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":206,\"name\":\"Akin Longe Ojo Eshovo\"}}', '2020-03-26 12:20:09', '2020-04-18 14:04:19'),
(31, 2, 223, 'Service Assigned', 'You have been assigned a service Painting Services', 1, 0, '{\"id\":120,\"date\":\"03\\/25\\/2020 - 03\\/25\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"26 Bori Road\",\"additional_information\":\"painting\",\"image\":\"2058101833.jpg\",\"user_id\":206,\"service_id\":79,\"payment_type\":null,\"status\":4,\"assign_provider\":\"223\",\"price\":null,\"extra_information\":null,\"sub_category\":\"66,67\",\"mobile_no\":\"08187759009\",\"whatsapp_no\":\"08187759009\",\"created_at\":\"2020-03-25 11:58:24\",\"updated_at\":\"2020-03-27 14:01:23\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/25\\/2020 \",\" 03\\/25\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":206,\"name\":\"Akin Longe Ojo Eshovo\"}}', '2020-03-27 08:31:34', '2020-04-18 14:04:19'),
(32, 1, 223, 'Start confirmation', 'Akin Longe Ojo Eshovouser has confirmed start of Electrical Installation & Maintenance Services', 1, 0, '{\"id\":18,\"service_booking_id\":115,\"start_at_provider\":\"2020-03-27 10:22:31\",\"end_at_provider\":null,\"ack_start\":\"2020-03-27 14:05:39\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-03-27 15:52:31\",\"updated_at\":\"2020-03-27 14:05:39\"}', '2020-03-27 08:35:39', '2020-04-18 14:04:19'),
(33, 2, 223, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 1, 0, '{\"id\":126,\"date\":\"03\\/27\\/2020 - 03\\/27\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI\",\"additional_information\":\"fix sockets\",\"image\":null,\"user_id\":206,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"223\",\"price\":\"13440\",\"extra_information\":null,\"sub_category\":\"10,11\",\"mobile_no\":\"08187759009\",\"whatsapp_no\":\"08187759009\",\"created_at\":\"2020-03-27 15:31:55\",\"updated_at\":\"2020-03-27 15:37:51\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/27\\/2020 \",\" 03\\/27\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":206,\"name\":\"Akin Longe Ojo Eshovo\"}}', '2020-03-27 10:08:02', '2020-04-18 14:04:19'),
(34, 2, 210, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 1, 0, '{\"id\":139,\"date\":\"04\\/24\\/2020 - 04\\/25\\/2020\",\"time\":\"19:17:00 - 19:17:00\",\"address\":\"89,raghunath puri 1 ,shoepur road,sanganer, pratap nagar, Tonk Rd, Maruti Nagar, Jaipur, Rajasthan 302033, India\",\"additional_information\":\"All good till now\",\"image\":\"15859181179683.jpg\",\"user_id\":261,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1818\",\"extra_information\":null,\"sub_category\":\"11,13,14\",\"mobile_no\":\"5335365\",\"whatsapp_no\":\"564666\",\"created_at\":\"2020-04-03 12:48:37\",\"updated_at\":\"2020-04-03 16:39:06\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/24\\/2020 \",\" 04\\/25\\/2020\"],\"start_time\":[\"19:17:00 \",\" 19:17:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-03 11:09:21', '2020-04-08 09:35:39'),
(35, 101, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Electrical Installation & Maintenance Services', 1, 0, 'null', '2020-04-03 11:12:14', '2020-04-17 09:18:19'),
(36, 2, 210, 'Service Assigned', 'You have been assigned a service POP Ceiling Installation & Maintenance Services', 1, 0, '{\"id\":140,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:11:00 - 19:11:00\",\"address\":\"Gopalbari, Jaipur, Rajasthan 302016, India\",\"additional_information\":\"Testing\",\"image\":\"15859393384211.jpg\",\"user_id\":261,\"service_id\":78,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"457\",\"extra_information\":null,\"sub_category\":\"61,62,63\",\"mobile_no\":\"315464\",\"whatsapp_no\":\"494949\",\"created_at\":\"2020-04-03 18:42:18\",\"updated_at\":\"2020-04-03 18:46:10\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/16\\/2020 \",\" 04\\/29\\/2020\"],\"start_time\":[\"17:11:00 \",\" 19:11:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-03 13:16:20', '2020-04-08 09:35:39'),
(37, 2, 202, 'Service Assigned', 'You have been assigned a service Fumigation & Pests Control Services', 0, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"202\",\"price\":\"2745\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-03 19:08:24\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/16\\/2020 \",\" 04\\/29\\/2020\"],\"start_time\":[\"17:24:00 \",\" 17:30:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-03 13:38:34', '2020-04-03 13:38:34'),
(38, 2, 210, 'Service Assigned', 'You have been assigned a service Appliances Installation and Repair Services', 1, 0, '{\"id\":132,\"date\":\"04\\/11\\/2020 - 04\\/29\\/2020\",\"time\":\"18:11:00 - 17:34:00\",\"address\":\"Unnamed, Pretoria, 0049, South Africa\",\"additional_information\":\"All\",\"image\":null,\"user_id\":255,\"service_id\":71,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":null,\"extra_information\":null,\"sub_category\":\"20,21\",\"mobile_no\":\"2599888\",\"whatsapp_no\":\"886896\",\"created_at\":\"2020-03-31 18:42:13\",\"updated_at\":\"2020-04-03 19:10:20\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/11\\/2020 \",\" 04\\/29\\/2020\"],\"start_time\":[\"18:11:00 \",\" 17:34:00\"],\"user_details\":{\"id\":255,\"name\":\"Test\"}}', '2020-04-03 13:40:21', '2020-04-08 09:35:39'),
(39, 2, 210, 'Service Assigned', 'You have been assigned a service Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"2745\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-03 19:59:34\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/16\\/2020 \",\" 04\\/29\\/2020\"],\"start_time\":[\"17:24:00 \",\" 17:30:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-03 14:29:44', '2020-04-08 09:35:39'),
(40, 101, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, 'null', '2020-04-03 14:30:53', '2020-04-17 09:18:19'),
(41, 2, 210, 'Service Assigned', 'You have been assigned a service Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:15:10\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/16\\/2020 \",\" 04\\/29\\/2020\"],\"start_time\":[\"17:24:00 \",\" 17:30:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-06 05:45:21', '2020-04-08 09:35:39'),
(42, 101, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, 'null', '2020-04-06 05:46:39', '2020-04-17 09:18:19'),
(43, 1, 210, 'Start confirmation', 'Ajay Shankaruser has confirmed start of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-06 11:16:39\",\"end_at_provider\":null,\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-04-06 16:46:39\",\"updated_at\":\"2020-04-06 11:17:35\"}', '2020-04-06 05:47:35', '2020-04-08 09:35:39'),
(44, 1, 210, 'End confirmation', 'Ajay Shankar has confirmed end of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-06 11:16:39\",\"end_at_provider\":\"2020-04-06 11:17:57\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":4,\"created_at\":\"2020-04-06 16:47:57\",\"updated_at\":\"2020-04-06 11:41:58\"}', '2020-04-06 06:11:59', '2020-04-08 09:35:39'),
(51, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, 'null', '2020-04-06 07:54:29', '2020-04-17 09:18:19'),
(52, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:41:58\"}', '2020-04-06 08:07:52', '2020-04-17 09:18:19'),
(53, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"type\":3,\"data\":{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:41:58\"}}', '2020-04-06 08:22:31', '2020-04-17 09:18:19'),
(54, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:41:58\"}', '2020-04-06 08:29:23', '2020-04-17 09:18:19'),
(55, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:41:58\"}', '2020-04-06 08:34:43', '2020-04-17 09:18:19'),
(56, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"id\":141,\"date\":\"04\\/16\\/2020 - 04\\/29\\/2020\",\"time\":\"17:24:00 - 17:30:00\",\"address\":\"Jacksonville, FL, USA\",\"additional_information\":\"Testing all good\",\"image\":\"15859405436554.jpg\",\"user_id\":261,\"service_id\":88,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1707\",\"extra_information\":null,\"sub_category\":\"118,120\",\"mobile_no\":\"556558\",\"whatsapp_no\":\"888855\",\"created_at\":\"2020-04-03 19:02:23\",\"updated_at\":\"2020-04-06 11:41:58\"}', '2020-04-06 08:37:14', '2020-04-17 09:18:19'),
(57, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 08:56:16', '2020-04-17 09:18:19'),
(58, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 09:04:22', '2020-04-17 09:18:19'),
(59, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 09:23:47', '2020-04-17 09:18:19'),
(60, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 11:10:18', '2020-04-17 09:18:19'),
(61, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 11:16:48', '2020-04-17 09:18:19'),
(62, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-06 11:55:29', '2020-04-17 09:18:19'),
(63, 2, 210, 'Service Assigned', 'You have been assigned a service Bricklaying/Masonry Services', 1, 0, '{\"id\":142,\"date\":\"04\\/04\\/2020 - 04\\/04\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Jaipur\",\"additional_information\":\"test\",\"image\":\"1199393146.jpg\",\"user_id\":261,\"service_id\":75,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"1961\",\"extra_information\":null,\"sub_category\":\"47,49,50,52\",\"mobile_no\":\"8946807210\",\"whatsapp_no\":\"3453454\",\"created_at\":\"2020-04-03 19:38:40\",\"updated_at\":\"2020-04-06 19:50:02\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/04\\/2020 \",\" 04\\/04\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\"}}', '2020-04-06 14:20:13', '2020-04-08 09:35:39'),
(64, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 14:41:22', '2020-04-17 09:18:19'),
(65, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 14:52:27', '2020-04-17 09:18:19'),
(66, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 14:55:14', '2020-04-17 09:18:19'),
(67, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:00:28', '2020-04-17 09:18:19'),
(68, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:06:56', '2020-04-17 09:18:19'),
(69, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:14:58', '2020-04-17 09:18:19'),
(70, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:19:33', '2020-04-17 09:18:19'),
(71, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:22:30', '2020-04-17 09:18:19'),
(72, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:25:34', '2020-04-17 09:18:19'),
(73, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:28:40', '2020-04-17 09:18:19'),
(74, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:39:00', '2020-04-17 09:18:19'),
(75, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:40:23', '2020-04-17 09:18:19'),
(76, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:41:47', '2020-04-17 09:18:19'),
(77, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:19:35\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 02:49:30\",\"updated_at\":\"2020-04-06 21:19:35\"}', '2020-04-06 15:49:52', '2020-04-08 09:35:39'),
(78, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 15:51:38', '2020-04-17 09:18:19'),
(79, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:21:51\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 02:51:38\",\"updated_at\":\"2020-04-06 21:21:51\"}', '2020-04-06 15:51:57', '2020-04-08 09:35:39'),
(80, 1, 210, 'Start confirmation', 'Ajay Shankaruser has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:21:51\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":2,\"created_at\":\"2020-04-07 02:56:08\",\"updated_at\":\"2020-04-06 21:27:10\"}', '2020-04-06 15:57:11', '2020-04-08 09:35:39'),
(81, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:29:28\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 02:58:27\",\"updated_at\":\"2020-04-06 21:29:28\"}', '2020-04-06 15:59:28', '2020-04-08 09:35:39'),
(82, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 16:07:51', '2020-04-17 09:18:19'),
(83, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 16:10:21', '2020-04-17 09:18:19'),
(84, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:40:28\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 03:10:21\",\"updated_at\":\"2020-04-06 21:40:28\"}', '2020-04-06 16:10:29', '2020-04-08 09:35:39'),
(85, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 16:12:28', '2020-04-17 09:18:19'),
(86, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:42:34\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 03:12:28\",\"updated_at\":\"2020-04-06 21:42:34\"}', '2020-04-06 16:12:34', '2020-04-08 09:35:39'),
(87, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 16:15:10', '2020-04-17 09:18:19'),
(88, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:45:16\",\"end_at_provider\":\"2020-04-06 20:58:49\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-07 03:15:10\",\"updated_at\":\"2020-04-06 21:45:16\"}', '2020-04-06 16:15:17', '2020-04-08 09:35:39'),
(89, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Bricklaying/Masonry Services', 1, 0, '{\"service_booking_id\":\"142\"}', '2020-04-06 16:15:34', '2020-04-17 09:18:19'),
(90, 1, 210, 'End confirmation', 'Ajay Shankar has confirmed end of Bricklaying/Masonry Services', 1, 0, '{\"id\":30,\"service_booking_id\":142,\"start_at_provider\":\"2020-04-06 21:45:16\",\"end_at_provider\":\"2020-04-06 21:45:40\",\"ack_start\":\"2020-04-06 21:27:10\",\"ack_end\":null,\"service_status\":4,\"created_at\":\"2020-04-07 03:15:34\",\"updated_at\":\"2020-04-06 21:45:40\"}', '2020-04-06 16:15:40', '2020-04-08 09:35:39'),
(91, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 03:17:38', '2020-04-17 09:18:19'),
(92, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 08:48:44\",\"end_at_provider\":\"2020-04-06 17:26:36\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":\"2\",\"created_at\":\"2020-04-07 14:17:38\",\"updated_at\":\"2020-04-07 08:48:44\"}', '2020-04-07 03:18:55', '2020-04-08 09:35:39'),
(93, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 03:19:25', '2020-04-17 09:18:19'),
(94, 1, 210, 'End confirmation', 'Ajay Shankar has confirmed end of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 08:48:44\",\"end_at_provider\":\"2020-04-07 08:49:35\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":4,\"created_at\":\"2020-04-07 14:19:25\",\"updated_at\":\"2020-04-07 08:49:35\"}', '2020-04-07 03:19:35', '2020-04-08 09:35:39'),
(95, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 10:17:07', '2020-04-17 09:18:19'),
(96, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 15:47:26\",\"end_at_provider\":\"2020-04-07 08:49:35\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":\"2\",\"created_at\":\"2020-04-07 21:17:07\",\"updated_at\":\"2020-04-07 15:47:26\"}', '2020-04-07 10:17:37', '2020-04-08 09:35:39'),
(97, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 14:15:49', '2020-04-17 09:18:19'),
(98, 1, 210, 'End confirmation', 'Ajay Shankar has confirmed end of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 15:47:26\",\"end_at_provider\":\"2020-04-07 19:48:18\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":4,\"created_at\":\"2020-04-08 01:15:49\",\"updated_at\":\"2020-04-07 19:48:18\"}', '2020-04-07 14:18:29', '2020-04-08 09:35:39'),
(99, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 14:27:37', '2020-04-17 09:18:19'),
(100, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 14:40:22', '2020-04-17 09:18:19'),
(101, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 14:50:27', '2020-04-17 09:18:19'),
(102, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 20:20:39\",\"end_at_provider\":\"2020-04-07 19:48:18\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":\"2\",\"created_at\":\"2020-04-08 01:50:27\",\"updated_at\":\"2020-04-07 20:20:39\"}', '2020-04-07 14:50:40', '2020-04-08 09:35:39'),
(103, 4, 261, 'Confirm service start', 'Pushpendra has sent you service end request for Fumigation & Pests Control Services', 1, 0, '{\"service_booking_id\":\"141\"}', '2020-04-07 14:52:38', '2020-04-17 09:18:19'),
(104, 2, 210, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 1, 0, '{\"id\":131,\"date\":\"04\\/15\\/2020 - 04\\/17\\/2020\",\"time\":\"18:39:00 - 16:10:00\",\"address\":\"Amsterdam, Netherlands\",\"additional_information\":\"Testing all good\",\"image\":\"15856799404561.jpg\",\"user_id\":255,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":null,\"extra_information\":null,\"sub_category\":\"10,12,13,15\",\"mobile_no\":\"939393\",\"whatsapp_no\":\"939399\",\"created_at\":\"2020-03-31 18:39:00\",\"updated_at\":\"2020-04-08 06:13:31\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/15\\/2020 \",\" 04\\/17\\/2020\"],\"start_time\":[\"18:39:00 \",\" 16:10:00\"],\"user_details\":{\"id\":255,\"name\":\"Test\",\"notification_token\":null}}', '2020-04-08 00:43:42', '2020-04-08 09:35:39'),
(105, 2, 200, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 0, 0, '{\"id\":130,\"date\":\"03\\/31\\/2020 - 03\\/31\\/2020\",\"time\":\"20:46:00 - 21:15:00\",\"address\":\"Junction, Laheari Tola, Bhagalpur, Bihar 812002, India\",\"additional_information\":\"All good\",\"image\":\"15856768549806.jpg\",\"user_id\":255,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"200\",\"price\":null,\"extra_information\":null,\"sub_category\":\"10,12,14\",\"mobile_no\":\"5988568\",\"whatsapp_no\":\"8946807\",\"created_at\":\"2020-03-31 17:47:34\",\"updated_at\":\"2020-04-08 06:48:21\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"03\\/31\\/2020 \",\" 03\\/31\\/2020\"],\"start_time\":[\"20:46:00 \",\" 21:15:00\"],\"user_details\":{\"id\":255,\"name\":\"Test\",\"notification_token\":null}}', '2020-04-08 01:18:26', '2020-04-08 01:18:26'),
(106, 1, 210, 'End confirmation', 'Ajay Shankar has confirmed end of Fumigation & Pests Control Services', 1, 0, '{\"id\":29,\"service_booking_id\":141,\"start_at_provider\":\"2020-04-07 20:20:39\",\"end_at_provider\":\"2020-04-08 07:12:42\",\"ack_start\":\"2020-04-06 11:17:35\",\"ack_end\":\"2020-04-06 11:41:58\",\"service_status\":4,\"created_at\":\"2020-04-08 01:52:38\",\"updated_at\":\"2020-04-08 07:12:42\"}', '2020-04-08 01:42:53', '2020-04-08 09:35:39'),
(107, 5, 261, 'Price received', 'Price has been updated for your service ', 1, 0, '{\"service_booking_id\":144}', '2020-04-08 05:24:12', '2020-04-17 09:18:19'),
(108, 2, 210, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 1, 0, '{\"id\":144,\"date\":\"04\\/22\\/2020 - 04\\/24\\/2020\",\"time\":\"03:18:00 - 19:29:00\",\"address\":\"Gopalbari, Jaipur, Rajasthan 302016, India\",\"additional_information\":\"Test\",\"image\":\"15863428559168.jpg\",\"user_id\":261,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"2970\",\"extra_information\":null,\"sub_category\":\"10,12\",\"mobile_no\":\"8946807315\",\"whatsapp_no\":\"588588\",\"created_at\":\"2020-04-08 10:47:36\",\"updated_at\":\"2020-04-08 10:54:49\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/22\\/2020 \",\" 04\\/24\\/2020\"],\"start_time\":[\"03:18:00 \",\" 19:29:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\",\"notification_token\":\"01bcff83-050b-48f7-9680-10b2bf934a8d\"}}', '2020-04-08 05:24:59', '2020-04-08 09:35:39'),
(109, 6, 261, 'Provider assigned', 'Pushpendra has been assigned for your service Electrical Installation & Maintenance Services', 1, 0, '{\"service_booking_id\":144}', '2020-04-08 05:25:05', '2020-04-17 09:18:19'),
(110, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Electrical Installation & Maintenance Services', 1, 0, '{\"service_booking_id\":\"144\"}', '2020-04-08 05:25:52', '2020-04-17 09:18:19'),
(111, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Electrical Installation & Maintenance Services', 1, 0, '{\"id\":33,\"service_booking_id\":144,\"start_at_provider\":\"2020-04-08 10:56:02\",\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-08 16:25:52\",\"updated_at\":\"2020-04-08 10:56:02\"}', '2020-04-08 05:26:02', '2020-04-08 09:35:39'),
(112, 5, 261, 'Price received', 'Price has been updated for your service ', 1, 0, '{\"service_booking_id\":144}', '2020-04-08 05:29:29', '2020-04-17 09:18:19'),
(113, 5, 261, 'Price received', 'Price has been updated for your service ', 1, 0, '{\"service_booking_id\":144}', '2020-04-08 05:32:43', '2020-04-17 09:18:19'),
(114, 2, 210, 'Service Assigned', 'You have been assigned a service Electrical Installation & Maintenance Services', 1, 0, '{\"id\":144,\"date\":\"04\\/22\\/2020 - 04\\/24\\/2020\",\"time\":\"03:18:00 - 19:29:00\",\"address\":\"Gopalbari, Jaipur, Rajasthan 302016, India\",\"additional_information\":\"Test\",\"image\":\"15863428559168.jpg\",\"user_id\":261,\"service_id\":1,\"payment_type\":null,\"status\":4,\"assign_provider\":\"210\",\"price\":\"267\",\"extra_information\":null,\"sub_category\":\"10,12\",\"mobile_no\":\"8946807315\",\"whatsapp_no\":\"588588\",\"created_at\":\"2020-04-08 10:47:36\",\"updated_at\":\"2020-04-08 11:06:33\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/22\\/2020 \",\" 04\\/24\\/2020\"],\"start_time\":[\"03:18:00 \",\" 19:29:00\"],\"user_details\":{\"id\":261,\"name\":\"Ajay Shankar\",\"notification_token\":\"01bcff83-050b-48f7-9680-10b2bf934a8d\"}}', '2020-04-08 05:36:34', '2020-04-08 09:35:39'),
(115, 6, 261, 'Provider assigned', 'Pushpendra has been assigned for your service Electrical Installation & Maintenance Services', 1, 0, '{\"service_booking_id\":144}', '2020-04-08 05:36:34', '2020-04-17 09:18:19'),
(116, 3, 261, 'Confirm service start', 'Pushpendra has sent you service start request for Electrical Installation & Maintenance Services', 1, 0, '{\"service_booking_id\":\"144\"}', '2020-04-08 09:30:37', '2020-04-17 09:18:19'),
(117, 1, 210, 'Start confirmation', 'Ajay Shankar has confirmed start of Electrical Installation & Maintenance Services', 1, 0, '{\"id\":34,\"service_booking_id\":144,\"start_at_provider\":\"2020-04-08 15:05:23\",\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-08 20:30:37\",\"updated_at\":\"2020-04-08 15:05:23\"}', '2020-04-08 09:35:34', '2020-04-08 09:35:39'),
(118, 2, 105, 'Service Assigned', 'You have been assigned a service Plumbing Services', 0, 0, '{\"id\":147,\"date\":\"04\\/09\\/2020 - 04\\/09\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"wrty5t54rt5\",\"image\":\"923204456.jpg\",\"user_id\":160,\"service_id\":72,\"payment_type\":null,\"status\":4,\"assign_provider\":\"105\",\"price\":\"28\",\"extra_information\":null,\"sub_category\":\"26\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"345646464\",\"created_at\":\"2020-04-09 11:01:02\",\"updated_at\":\"2020-04-09 12:36:44\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/09\\/2020 \",\" 04\\/09\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":160,\"name\":\"user\",\"notification_token\":null}}', '2020-04-09 07:06:54', '2020-04-09 07:06:54'),
(119, 5, 261, 'Price received', 'Price has been updated for your service ', 1, 0, '{\"service_booking_id\":146}', '2020-04-14 08:08:50', '2020-04-17 09:18:19'),
(120, 5, 261, 'Price received', 'Price has been updated for your service ', 1, 0, '{\"service_booking_id\":146}', '2020-04-14 08:22:15', '2020-04-17 09:18:19');
INSERT INTO `notifications` (`id`, `type`, `user_id`, `title`, `message`, `is_read`, `is_delete`, `data`, `created_at`, `updated_at`) VALUES
(121, 5, 261, 'Price received', 'Price has been updated for your service Appliances Installation and Repair Services', 1, 0, '{\"service_booking_id\":146}', '2020-04-14 08:28:03', '2020-04-17 09:18:19'),
(124, 5, 281, 'Price received', 'Price has been updated for your service Cleaning & Janitorial Services', 1, 0, '{\"service_booking_id\":151}', '2020-04-17 10:52:57', '2020-04-17 10:54:59'),
(125, 2, 280, 'Service Assigned', 'You have been assigned a service Cleaning & Janitorial Services', 0, 0, '{\"id\":151,\"date\":\"04\\/18\\/2020 - 04\\/20\\/2020\",\"time\":\"22:49:00 - 23:49:00\",\"address\":\"89,raghunath puri 1 ,shoepur road,sanganer, pratap nagar, Tonk Rd, Maruti Nagar, Jaipur, Rajasthan 302033, India\",\"additional_information\":\"Ok tested\",\"image\":\"15871404102439.jpg\",\"user_id\":281,\"service_id\":82,\"payment_type\":null,\"status\":4,\"assign_provider\":\"280\",\"price\":\"2623\",\"extra_information\":null,\"sub_category\":\"91,93,95\",\"mobile_no\":\"8946807316\",\"whatsapp_no\":\"8946807317\",\"created_at\":\"2020-04-17 16:20:11\",\"updated_at\":\"2020-04-17 16:24:22\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/18\\/2020 \",\" 04\\/20\\/2020\"],\"start_time\":[\"22:49:00 \",\" 23:49:00\"],\"user_details\":{\"id\":281,\"name\":\"Kumar Divya Customer\",\"notification_token\":\"01bcff83-050b-48f7-9680-10b2bf934a8d\"}}', '2020-04-17 10:54:33', '2020-04-17 10:54:33'),
(126, 6, 281, 'Provider assigned', 'Kumar Divya has been assigned for your service Cleaning & Janitorial Services', 1, 0, '{\"service_booking_id\":151}', '2020-04-17 10:54:38', '2020-04-17 10:54:59'),
(127, 3, 281, 'Confirm service start', 'Kumar Divya has sent you service start request for Cleaning & Janitorial Services', 0, 0, '{\"service_booking_id\":\"151\"}', '2020-04-17 10:55:10', '2020-04-17 10:55:10'),
(128, 1, 280, 'Start confirmation', 'Kumar Divya Customer has confirmed start of Cleaning & Janitorial Services', 0, 0, '{\"id\":36,\"service_booking_id\":151,\"start_at_provider\":\"2020-04-17 16:25:18\",\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-17 21:55:10\",\"updated_at\":\"2020-04-17 16:25:18\"}', '2020-04-17 10:55:19', '2020-04-17 10:55:19'),
(129, 4, 281, 'Confirm service start', 'Kumar Divya has sent you service end request for Cleaning & Janitorial Services', 0, 0, '{\"service_booking_id\":\"151\"}', '2020-04-17 10:56:03', '2020-04-17 10:56:03'),
(130, 1, 280, 'End confirmation', 'Kumar Divya Customer has confirmed end of Cleaning & Janitorial Services', 0, 0, '{\"id\":36,\"service_booking_id\":151,\"start_at_provider\":\"2020-04-17 16:25:18\",\"end_at_provider\":\"2020-04-17 16:26:12\",\"ack_start\":null,\"ack_end\":null,\"service_status\":4,\"created_at\":\"2020-04-17 21:56:03\",\"updated_at\":\"2020-04-17 16:26:12\"}', '2020-04-17 10:56:12', '2020-04-17 10:56:12'),
(131, 1, 223, 'Start confirmation', 'Akin Longe Ojo Eshovo has confirmed start of Electrical Installation & Maintenance Services', 0, 0, '{\"id\":21,\"service_booking_id\":126,\"start_at_provider\":\"2020-04-23 15:33:43\",\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":\"2\",\"created_at\":\"2020-04-19 01:05:49\",\"updated_at\":\"2020-04-23 15:33:43\"}', '2020-04-23 10:03:54', '2020-04-23 10:03:54'),
(132, 5, 261, 'Price received', 'Price has been updated for your service General Carpentry Services', 0, 0, '{\"service_booking_id\":145}', '2020-04-25 08:00:40', '2020-04-25 08:00:40'),
(133, 5, 206, 'Price received', 'Price has been updated for your service General Carpentry Services', 1, 0, '{\"service_booking_id\":122}', '2020-04-25 08:04:11', '2020-04-25 10:17:28'),
(134, 5, 160, 'Price received', 'Price has been updated for your service General Carpentry Services', 0, 0, '{\"service_booking_id\":114}', '2020-04-25 08:05:10', '2020-04-25 08:05:10'),
(135, 5, 160, 'Price received', 'Price has been updated for your service Plumbing Services', 0, 0, '{\"service_booking_id\":152}', '2020-04-25 08:06:33', '2020-04-25 08:06:33'),
(136, 2, 107, 'Service Assigned', 'You have been assigned a service Appliances Installation and Repair Services', 0, 0, '{\"id\":148,\"date\":\"04\\/17\\/2020 - 05\\/17\\/2020\",\"time\":\"00:00:00 - 23:59:59\",\"address\":\"Bhilwara, Rajasthan, India\",\"additional_information\":\"bb578\",\"image\":null,\"user_id\":160,\"service_id\":71,\"payment_type\":null,\"status\":4,\"assign_provider\":\"107\",\"price\":\"45\",\"extra_information\":null,\"sub_category\":\"16\",\"mobile_no\":\"7742616737\",\"whatsapp_no\":\"67612278172\",\"created_at\":\"2020-04-09 12:39:01\",\"updated_at\":\"2020-04-28 07:25:08\",\"start_at_provider\":null,\"end_at_provider\":null,\"ack_start\":null,\"ack_end\":null,\"service_status\":0,\"start_date\":[\"04\\/17\\/2020 \",\" 05\\/17\\/2020\"],\"start_time\":[\"00:00:00 \",\" 23:59:59\"],\"user_details\":{\"id\":160,\"name\":\"user\",\"notification_token\":\"aedce1b7-65c3-4ffd-a1e3-b1581cd93b53\"}}', '2020-04-28 01:55:18', '2020-04-28 01:55:18'),
(137, 6, 160, 'Provider assigned', 'wdfwed has been assigned for your service Appliances Installation and Repair Services', 0, 0, '{\"service_booking_id\":148}', '2020-04-28 01:55:24', '2020-04-28 01:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1-active 2-inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`, `status`, `created_at`) VALUES
(25, 'lary@getnada.com', '8036517', 1, '2019-12-14 10:52:04'),
(26, 'vokyp@getnada.com', '5347445', 1, '2019-12-16 04:05:38'),
(27, 'vinitaprajapati199@gmail.com', '5371000', 1, '2019-12-16 08:05:04'),
(30, 'dojo@getnada.com', '8465476', 1, '2019-12-23 00:56:17'),
(31, 'lary2@getnada.com', '5955261', 1, '2019-12-23 00:59:06'),
(32, 'narayan1@mailinator.com', '5738931', 1, '2019-12-23 07:42:24'),
(33, 'riya@getnada.com', '3606601', 1, '2019-12-24 06:23:16'),
(34, 'qqqq@getnada.com', '6310919', 1, '2019-12-26 01:09:21'),
(35, 'arora@mailinator.com', '6279420', 1, '2019-12-26 01:52:52'),
(38, 'devqa@getnada.com', '4100575', 1, '2019-12-30 14:19:26'),
(40, 'devqa@gatnada.com', '2738564', 1, '2019-12-31 07:48:39'),
(41, 'xerofib@getnada.com', '6011901', 1, '2019-12-26 09:09:19'),
(46, 'test@getnada.com', '4814984', 1, '2020-02-25 02:14:46');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_number` int(11) NOT NULL,
  `cvv` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `amount` varchar(256) NOT NULL,
  `payemt_status` int(11) NOT NULL COMMENT '0=unsuccess 1=success',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_key` varchar(200) DEFAULT NULL,
  `mobile_no` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `id` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `expiry_year` varchar(256) NOT NULL,
  `expiry_month` varchar(200) NOT NULL,
  `cvv` int(11) DEFAULT NULL,
  `defalut_card` tinyint(4) NOT NULL DEFAULT '0' COMMENT '	dafault=1 not defalut=0',
  `user_id` int(11) NOT NULL,
  `cardholder_name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_card`
--

INSERT INTO `payment_card` (`id`, `card_number`, `expiry_year`, `expiry_month`, `cvv`, `defalut_card`, `user_id`, `cardholder_name`, `created_at`, `updated_at`, `is_delete`) VALUES
(1, '54355435435555', '2022', '2', NULL, 0, 160, 'fgfhfghg', '2020-03-06 17:14:45', '2020-03-06 11:44:45', 0),
(2, '54466666666666', '2023', '8', NULL, 1, 160, 'sdfdsf', '2020-03-06 17:14:45', '2020-03-06 11:44:45', 0),
(5, '2244887888874865', '2024', '01', NULL, 1, 261, 'DEVESH PANDEY', '2020-04-14 12:39:21', '2020-04-14 07:09:21', 0),
(4, '4884581818148', '2024', '07', NULL, 1, 261, 'AJAY SHANKAR', '2020-04-14 12:39:21', '2020-04-14 07:09:21', 1),
(6, '2434534534534646', '2024', '05', NULL, 0, 261, 'RAJAN KUMAR', '2020-04-14 10:11:35', '2020-04-14 04:41:35', 0),
(7, '345464643443456', '2027', '03', NULL, 0, 261, 'Amit Kumar', '2020-04-14 12:39:44', '2020-04-14 07:09:44', 1),
(8, '51993366548745', '2022', '4', NULL, 1, 215, 'ugochukwu williams', '2020-06-08 03:09:33', '2020-06-08 03:09:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `servicebooking_id` int(11) DEFAULT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `provider_id`, `user_id`, `rating`, `review`, `created_at`, `updated_at`, `servicebooking_id`, `service_id`) VALUES
(8, 210, 160, 3, 'fsfsf', '2020-05-05 04:57:59', '2020-05-05 04:57:59', 113, 71),
(9, 210, 160, 3, 'fsfsf', '2020-05-05 04:58:09', '2020-05-05 04:58:09', 113, 71),
(10, 210, 160, 4, 'dddd', '2020-05-05 04:58:25', '2020-05-05 04:58:25', 112, 76),
(11, 210, 160, 4, 'dddd', '2020-05-05 04:58:29', '2020-05-05 04:58:29', 112, 76),
(12, 210, 160, 4, 'dddd', '2020-05-05 04:59:09', '2020-05-05 04:59:09', 112, 76),
(13, 210, 160, 3, 'ssssssssss dd', '2020-05-05 05:01:39', '2020-05-05 05:01:39', 113, 71),
(14, 210, 160, 3, 'ssssssssss dd', '2020-05-05 05:01:41', '2020-05-05 05:01:41', 113, 71),
(15, 210, 160, 2, NULL, '2020-05-05 05:16:06', '2020-05-05 05:16:06', 113, 71),
(16, 210, 160, 2, NULL, '2020-05-05 05:16:08', '2020-05-05 05:16:08', 113, 71),
(17, 210, 160, 3, NULL, '2020-05-05 06:05:07', '2020-05-05 06:05:07', 113, 71),
(18, 210, 160, 3, 'aaaaaaaa', '2020-05-05 06:05:11', '2020-05-05 06:05:11', 113, 71),
(19, 210, 160, 3, 'aaaaaaaa', '2020-05-05 06:05:12', '2020-05-05 06:05:12', 113, 71),
(20, 210, 160, 3, NULL, '2020-05-05 06:07:38', '2020-05-05 06:07:38', 113, 71),
(21, 210, 160, 4, NULL, '2020-05-05 06:09:31', '2020-05-05 06:09:31', 113, 71),
(22, 210, 160, 4, NULL, '2020-05-05 06:09:36', '2020-05-05 06:09:36', 113, 71),
(23, 221, 160, 2, 'aaaaaaaaaaa', '2020-05-05 06:09:59', '2020-05-05 06:09:59', 109, 71),
(24, 210, 160, 3, 'sssss', '2020-05-05 06:12:12', '2020-05-05 06:12:12', 112, 76),
(25, 210, 160, 2, 'ggggg', '2020-05-05 06:20:00', '2020-05-05 06:20:00', 112, 76);

-- --------------------------------------------------------

--
-- Table structure for table `service_acknowledgements`
--

CREATE TABLE `service_acknowledgements` (
  `id` int(11) NOT NULL,
  `service_booking_id` int(11) NOT NULL,
  `start_at_provider` datetime DEFAULT NULL,
  `end_at_provider` datetime DEFAULT NULL,
  `ack_start` datetime DEFAULT NULL,
  `ack_end` datetime DEFAULT NULL,
  `service_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=>not_start, 1=>start_request_sent, 2=>start_confirmed_by_customer, 3=>end_request_sent, 4=>end_confirmed_by_customer',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_acknowledgements`
--

INSERT INTO `service_acknowledgements` (`id`, `service_booking_id`, `start_at_provider`, `end_at_provider`, `ack_start`, `ack_end`, `service_status`, `created_at`, `updated_at`) VALUES
(35, 147, NULL, NULL, NULL, NULL, 0, '2020-04-09 07:06:44', '2020-04-09 07:06:44'),
(11, 108, '2020-03-19 12:12:40', '2020-03-19 12:14:50', '2020-03-19 12:13:28', '2020-03-19 12:14:53', 4, '2020-03-19 12:14:53', '2020-03-19 06:44:53'),
(10, 107, '2020-03-19 11:27:55', '2020-03-19 11:55:22', '2020-03-19 11:28:22', '2020-03-19 11:56:58', 4, '2020-03-19 11:56:58', '2020-03-19 06:26:58'),
(13, 111, '2020-03-20 10:30:37', '2020-03-20 10:32:51', '2020-03-20 10:31:19', '2020-03-20 10:33:10', 4, '2020-03-20 10:33:10', '2020-03-20 05:03:10'),
(14, 112, '2020-03-20 14:07:15', '2020-03-20 14:34:46', '2020-03-20 14:17:28', '2020-03-20 14:34:59', 4, '2020-03-20 14:34:59', '2020-03-20 09:04:59'),
(15, 113, '2020-03-21 15:08:40', '2020-03-21 15:10:34', '2020-03-21 15:09:54', '2020-03-21 15:11:09', 4, '2020-03-21 15:11:09', '2020-03-21 09:41:09'),
(16, 116, NULL, NULL, NULL, NULL, 0, '2020-03-25 06:29:48', '2020-03-25 06:29:48'),
(17, 119, NULL, NULL, NULL, NULL, 0, '2020-03-25 06:46:36', '2020-03-25 06:46:36'),
(18, 115, '2020-03-27 10:22:31', NULL, '2020-03-27 14:05:39', NULL, 2, '2020-03-27 14:05:39', '2020-03-27 08:35:39'),
(19, 121, '2020-03-26 17:51:12', NULL, NULL, NULL, 1, '2020-03-26 17:51:12', '2020-03-26 12:21:12'),
(20, 120, '2020-03-27 14:18:04', NULL, NULL, NULL, 1, '2020-03-27 14:18:04', '2020-03-27 08:48:04'),
(21, 126, '2020-04-23 15:33:43', NULL, NULL, NULL, 2, '2020-04-23 15:33:43', '2020-04-23 10:03:43'),
(31, 131, NULL, NULL, NULL, NULL, 0, '2020-04-08 00:43:31', '2020-04-08 00:43:31'),
(29, 141, '2020-04-07 20:20:39', '2020-04-08 07:12:42', '2020-04-06 11:17:35', '2020-04-06 11:41:58', 4, '2020-04-08 07:12:42', '2020-04-08 01:42:42'),
(32, 130, NULL, NULL, NULL, NULL, 0, '2020-04-08 01:18:21', '2020-04-08 01:18:21'),
(34, 144, '2020-04-08 15:05:23', NULL, NULL, NULL, 2, '2020-04-08 15:05:23', '2020-04-08 09:35:23'),
(36, 151, '2020-04-17 16:25:18', '2020-04-17 16:26:12', NULL, NULL, 4, '2020-04-17 16:26:12', '2020-04-17 10:56:12'),
(37, 148, NULL, NULL, NULL, NULL, 0, '2020-04-28 01:55:08', '2020-04-28 01:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `service_booking`
--

CREATE TABLE `service_booking` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `additional_information` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `payment_type` varchar(30) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=book service 1=request service 3=cancel 4=(assign privider)booked 5 =compelete service',
  `assign_provider` varchar(50) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `extra_information` varchar(255) DEFAULT NULL COMMENT 'this firld for admin..admin will fill axtra infoe with price',
  `sub_category` varchar(255) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `whatsapp_no` varchar(20) NOT NULL,
  `rating_status` int(11) NOT NULL DEFAULT '0' COMMENT '1=rating done',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_booking`
--

INSERT INTO `service_booking` (`id`, `date`, `time`, `address`, `additional_information`, `image`, `user_id`, `service_id`, `payment_type`, `status`, `assign_provider`, `price`, `extra_information`, `sub_category`, `mobile_no`, `whatsapp_no`, `rating_status`, `created_at`, `updated_at`) VALUES
(107, '03/19/2020 - 03/19/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'TESTES', '1328927716.png', 160, 72, NULL, 0, NULL, '876', NULL, '24,25,26', '7742616737', '345345345', 0, '2020-03-19 05:49:27', '2020-03-19 06:26:58'),
(108, '03/19/2020 - 03/19/2020', '00:00:00 - 23:59:59', 'GGSIPU, Sector 16 C, Dwarka, Delhi, India', 'rtrtrtrtr', '1663035693.jpeg', 160, 72, NULL, 4, '221', '180', NULL, '27', '7742616737', '4545455', 0, '2020-03-19 06:39:19', '2020-03-19 06:44:53'),
(109, '03/19/2020 - 03/19/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'tests', '2079791363.jpg', 160, 71, NULL, 5, '221', '364', NULL, '18,19', '7742616737', '3453345', 0, '2020-03-19 06:49:54', '2020-03-19 07:09:40'),
(110, '03/19/2020 - 03/19/2020', '00:00:00 - 23:59:59', 'Grand Canyon National Park, Arizona, USA', 'ttutruytuyu', '126402713.png', 212, 73, NULL, 1, NULL, '1883', NULL, '36', '76576767', '56567565', 0, '2020-03-19 07:02:44', '2020-03-19 07:03:07'),
(111, '03/20/2020 - 03/20/2020', '00:00:00 - 23:59:59', 'Jaipur, Rajasthan, India', 'test gud sdsdj jsdjsb sdsd  ddwewe', '765478597.png', 224, 1, NULL, 5, '223', '314', NULL, '10', '72347272', '7975906466', 0, '2020-03-20 04:48:28', '2020-03-20 05:03:10'),
(112, '03/20/2020 - 03/20/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'tests', '696896694.jpg', 160, 76, NULL, 5, '210', '20866', NULL, '152,153,154,155,156', '7742616737', '3435354', 0, '2020-03-20 08:32:43', '2020-03-20 09:04:59'),
(113, '03/21/2020 - 03/21/2020', '00:00:00 - 23:59:59', 'Jaipur Railway Station Main Entry, Gopalbari, Jaipur, Rajasthan, India', 'Hello Test', '254064903.jpg', 160, 71, NULL, 5, '210', '190', NULL, '16,18,20,22', '7742616737', '55446546', 0, '2020-03-21 09:34:17', '2020-03-21 09:41:07'),
(114, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', 'sanganer', 'rgretre', '286759783.jpg', 160, 73, NULL, 1, NULL, '10', NULL, '36', '7742616737', '96546565', 0, '2020-03-25 02:04:54', '2020-04-25 08:04:54'),
(115, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', '26 Bori Road', 'Fix sockets.', '690011785.png', 206, 1, NULL, 4, '223', NULL, NULL, '10,11', '08187759009', '08187759009', 0, '2020-03-25 02:54:45', '2020-03-26 07:57:47'),
(116, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'Fix leaking taps.', '574696026.jpg', 206, 72, NULL, 3, '218', NULL, NULL, '24,25', '08187759009', '08187759009', 0, '2020-03-25 02:59:27', '2020-03-25 06:31:00'),
(117, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'uguyg uyguyguy', NULL, 160, 72, NULL, 1, NULL, NULL, NULL, '25', '7742616737', '87678767', 0, '2020-03-25 05:53:04', '2020-03-25 05:53:04'),
(118, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', '5t56t54 5 6546y54', NULL, 160, 74, NULL, 1, NULL, NULL, NULL, '41', '7742616737', '65665465465', 0, '2020-03-25 06:02:30', '2020-03-25 06:02:30'),
(119, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'r5e4634546', NULL, 160, 71, NULL, 4, '201', NULL, NULL, '21', '7742616737', '464364534', 0, '2020-03-25 06:10:49', '2020-03-25 06:46:36'),
(120, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', '26 Bori Road', 'painting', '2058101833.jpg', 206, 79, NULL, 4, '223', NULL, NULL, '66,67', '08187759009', '08187759009', 0, '2020-03-25 06:28:24', '2020-03-27 08:31:23'),
(121, '03/25/2020 - 03/25/2020', '00:00:00 - 23:59:59', '26 Bori Road', 'ht ba', NULL, 206, 93, NULL, 4, '223', NULL, NULL, '144', '08187759009', '08187759009', 0, '2020-03-25 07:28:32', '2020-03-26 12:19:58'),
(122, '03/26/2020 - 03/26/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'fix my door', NULL, 206, 73, NULL, 0, NULL, '4', NULL, '33,34', '08187759009', '08187759009', 0, '2020-03-26 07:53:15', '2020-04-25 10:17:42'),
(123, '03/26/2020 - 03/26/2020', '16:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'Service two units of ACs.', NULL, 206, 76, NULL, 3, NULL, '4480', NULL, '151,152', '08187759009', '08187759009', 0, '2020-03-26 12:16:20', '2020-03-30 12:29:54'),
(124, '03/27/2020 - 03/27/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'fix pipes', NULL, 206, 72, NULL, 1, NULL, NULL, NULL, '24,25', '08187759009', '08187759009', 0, '2020-03-27 04:50:41', '2020-03-27 04:50:41'),
(125, '03/27/2020 - 03/27/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'Fix leakages', NULL, 206, 72, NULL, 3, NULL, '8960', NULL, '24,25', '08187759009', '08187759009', 0, '2020-03-27 08:26:06', '2020-03-30 12:29:43'),
(126, '03/27/2020 - 03/27/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'fix sockets', NULL, 206, 1, NULL, 4, '223', '13440', NULL, '10,11', '08187759009', '08187759009', 0, '2020-03-27 10:01:55', '2020-03-27 10:07:51'),
(127, '03/31/2020-03/31/2020', '19:45:00-17:45:00', 'C-21, Block C 5, Hauz Khas Enclave, Hauz Khas, New Delhi, Delhi 110016, India', 'sdsdsd', NULL, 251, 71, NULL, 0, NULL, NULL, NULL, '22', '3434334', '3343434', 0, '2020-03-30 06:47:39', '2020-03-30 06:47:39'),
(128, '03/30/2020 - 03/30/2020', '00:00:00 - 23:59:59', '34 Old Aba Road, Rumuobiakanni', 'Change lamp holdet', NULL, 206, 1, NULL, 1, NULL, NULL, NULL, '10,11', '08187759009', '08187759009', 0, '2020-03-30 12:29:25', '2020-03-30 12:29:25'),
(129, '03/31/2020 - 03/31/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'tset', NULL, 160, 71, NULL, 1, NULL, NULL, NULL, '19,21', '7742616737', '4564564', 0, '2020-03-31 09:11:16', '2020-03-31 09:11:16'),
(130, '03/31/2020 - 03/31/2020', '20:46:00 - 21:15:00', 'Junction, Laheari Tola, Bhagalpur, Bihar 812002, India', 'All good', '15856768549806.jpg', 255, 1, NULL, 4, '200', NULL, NULL, '10,12,14', '5988568', '8946807', 0, '2020-03-31 12:17:34', '2020-04-08 01:18:21'),
(131, '04/15/2020 - 04/17/2020', '18:39:00 - 16:10:00', 'Amsterdam, Netherlands', 'Testing all good', '15856799404561.jpg', 255, 1, NULL, 4, '210', '49', NULL, '10,12,13,15', '939393', '939399', 0, '2020-03-31 13:09:00', '2020-04-25 08:01:42'),
(132, '04/11/2020 - 04/29/2020', '18:11:00 - 17:34:00', 'Unnamed, Pretoria, 0049, South Africa', 'All', NULL, 255, 71, NULL, 4, '210', '1108', NULL, '20,21', '2599888', '886896', 0, '2020-03-31 13:12:13', '2020-04-08 01:38:47'),
(133, '03/31/2020 - 03/31/2020', '00:00:00 - 23:59:59', '34 Old Aba Road, Rumuobiakanni', 'Fix sockets', NULL, 206, 1, NULL, 1, NULL, '28', NULL, '11,12', '8187759009', '8187759009', 0, '2020-03-31 14:06:26', '2020-04-08 01:03:05'),
(137, '04/02/2020 - 04/02/2020', '00:00:00 - 23:59:59', '34 Old Aba Road, Rumuobiakanni', 'Full house painting', NULL, 206, 79, NULL, 1, NULL, '592', NULL, '67,69', '8187759009', '8187759009', 0, '2020-04-02 05:19:40', '2020-04-08 00:44:21'),
(138, '04/04/2020 - 04/17/2020', '03:03:00 - 23:59:59', 'Woji, Port Harcourt, Nigeria', 'I want an electrical instyallation in my new apartment', '1390079714.png', 215, 1, NULL, 1, NULL, '1021944', NULL, '10,12', '2348068686676', '2348029943391', 0, '2020-04-03 06:44:08', '2020-04-03 06:48:19'),
(141, '04/16/2020 - 04/29/2020', '17:24:00 - 17:30:00', 'Jacksonville, FL, USA', 'Testing all good', '15859405436554.jpg', 261, 88, NULL, 5, '210', '1707', NULL, '118,120', '556558', '888855', 0, '2020-04-03 13:32:23', '2020-04-08 01:42:42'),
(142, '04/04/2020 - 04/04/2020', '00:00:00 - 23:59:59', 'Jaipur', 'test', '1199393146.jpg', 261, 75, NULL, 4, '210', '1961', NULL, '47,49,50,52', '8946807210', '3453454', 0, '2020-04-03 14:08:40', '2020-04-06 16:15:40'),
(143, '04/07/2020 - 04/07/2020', '00:00:00 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'bkbhfgkgkj', NULL, 206, 1, NULL, 1, NULL, '28', NULL, '10,11', '08187759009', '08187759009', 0, '2020-04-07 08:50:01', '2020-04-08 00:42:53'),
(144, '04/22/2020 - 04/24/2020', '03:18:00 - 19:29:00', 'Gopalbari, Jaipur, Rajasthan 302016, India', 'Test', '15863428559168.jpg', 261, 1, NULL, 4, '210', '267', NULL, '10,12', '8946807315', '588588', 0, '2020-04-08 05:17:36', '2020-04-08 05:36:33'),
(145, '04/24/2020 - 04/28/2020', '20:00:00 - 17:00:00', 'No.65/1B, Kaikondrahalli, Varthur Hobli, &nbsp;Sarjapur Road, Bangalore East, Kaikondrahalli, Bengaluru, Karnataka 560035, India', 'Ok, testing is almost done', NULL, 261, 73, NULL, 1, NULL, '28', NULL, '33,34,35', '567567', '678678', 0, '2020-04-08 09:01:04', '2020-04-25 08:00:06'),
(146, '04/23/2020 - 04/24/2020', '17:30:00 - 17:30:00', 'Haldighati Marg, Sanganer, Pratap Nagar, Jaipur, Rajasthan 302033, India', 'Ok done', '15863582965696.jpg', 261, 71, NULL, 1, NULL, '2056', NULL, '21', '8526559', '955699', 0, '2020-04-08 09:34:56', '2020-04-14 08:27:46'),
(147, '04/09/2020 - 04/09/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'wrty5t54rt5', '923204456.jpg', 160, 72, NULL, 4, '105', '28', NULL, '26', '7742616737', '345646464', 0, '2020-04-09 05:31:02', '2020-04-09 07:06:44'),
(148, '04/17/2020 - 05/17/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'bb578', NULL, 160, 71, NULL, 4, '107', '45', NULL, '16', '7742616737', '67612278172', 0, '2020-04-09 07:09:01', '2020-04-28 01:55:08'),
(149, '04/27/2020 - 04/30/2020', '02:00:00 - 03:15:00', 'Jaipur, Rajasthan, India', 'Helo', NULL, 261, 1, NULL, 1, NULL, '2688', NULL, '10,11', '5946807316', '765458', 0, '2020-04-17 09:22:53', '2020-04-17 10:42:51'),
(151, '04/18/2020 - 04/20/2020', '22:49:00 - 23:49:00', '89,raghunath puri 1 ,shoepur road,sanganer, pratap nagar, Tonk Rd, Maruti Nagar, Jaipur, Rajasthan 302033, India', 'Ok tested', '15871404102439.jpg', 281, 82, NULL, 5, '280', '2623', NULL, '91,93,95', '8946807316', '8946807317', 0, '2020-04-17 10:50:11', '2020-04-17 10:56:12'),
(152, '04/25/2020 - 04/25/2020', '00:00:00 - 23:59:59', 'Bhilwara, Rajasthan, India', 'DDDDDDDDDDDD', NULL, 160, 72, NULL, 1, NULL, '4', NULL, '25', '7742616737', '2222222222222', 0, '2020-04-25 08:05:51', '2020-04-25 08:06:26'),
(153, '04/28/2020 - 04/28/2020', '00:03:03 - 23:59:59', 'T & D PRESS LTD, 34 OLD ABA ROAD, RUMUOBIAKANNI', 'ABc ehhdelkd', NULL, 206, 73, NULL, 3, NULL, NULL, NULL, '33,34', '08187759009', '08187759009', 0, '2020-04-28 07:56:18', '2020-04-28 07:56:53'),
(154, '05/27/2020 - 05/28/2020', '23:07:00 - 12:07:00', '34 Old Aba Rd, Obia, Port Harcourt, Nigeria', 'Fix my waste', NULL, 206, 92, NULL, 1, NULL, NULL, NULL, '141', '8187759009', '8187759009', 0, '2020-05-27 05:39:07', '2020-05-27 05:39:07'),
(155, '05/29/2020 - 05/30/2020', '13:43:00 - 13:44:00', '34 Old Aba Road port harcourt', 'Fix sucket', NULL, 206, 1, NULL, 1, NULL, '192371', NULL, '10,11', '2348187759009', '8187759009', 0, '2020-05-28 07:15:58', '2020-06-05 01:54:04'),
(156, '06/04/2020 - 06/04/2020', '08:00:00 - 23:59:59', 'Woji, Port Harcourt, Nigeria', 'we require this services', '266448858.png', 215, 1, NULL, 1, NULL, '53960', NULL, '11,12,13', '2348068686676', '2348029943391', 0, '2020-06-04 05:31:53', '2020-06-04 05:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `service_managemenets`
--

CREATE TABLE `service_managemenets` (
  `id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `services_offered` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `service_overview` text,
  `Availability` varchar(255) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0' COMMENT '1=delete',
  `active_status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active 1=deactive',
  `featured_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_managemenets`
--

INSERT INTO `service_managemenets` (`id`, `category_name`, `services_offered`, `image`, `service_overview`, `Availability`, `price`, `is_delete`, `active_status`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Electrical Installation & Maintenance Services', NULL, '1450886045.jpg', 'Our Electrical Services includes all range of electrical problems or projects covering repairs and replacement, new installations and major electrical projects.\r\nGet professional electrical services from highly qualified and vetted electricians. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '2000861566.jpg', '2020-03-27 12:30:07', '2020-03-27 07:00:07'),
(71, 'Appliances Installation and Repair Services', NULL, '683495661.jpg', 'We install, maintain and repair all range of home appliances such as Fridges and Freezers, Washing Machines, Microwave, Televisions, Electric cookers and all types of electrical and electronic appliances\r\n\r\nGet professional services from our highly trained and qualified technicians who have been vetted with background checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '96626826.jpg', '2020-03-27 12:28:43', '2020-03-27 06:58:43'),
(72, 'Plumbing Services', NULL, '870471739.jpg', 'We ensure that your plumbing systems function optimally by maintaining, repairing and installing world class standard materials handled by trained and vetted professionals.\r\n\r\nGet professional services from our highly trained and qualified Plumbers who have been vetted with background checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1788906208.jpg', '2020-03-27 12:26:47', '2020-03-27 06:56:47'),
(73, 'General Carpentry Services', NULL, '391024392.jpg', 'We nail it, we join it, we mend it and we give you a beautiful wood work and carpentry services, that’s second to none.\r\n\r\nLet’s fix it for you. Get professional services from our highly trained and qualified Carpenters and wood worker who have been trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1828544719.jpg', '2020-03-27 12:25:08', '2020-03-27 06:55:08'),
(74, 'Carpentry:  Roofing Installation & Maintenance Services', NULL, '251583290.jpg', 'We ensure that you are effectively ‘covered’ with our professional roofing solution providers. We mend leaking roofs and we install new roofing projects of all types – Zinc, corrugated aluminum and stone-coated tiles and etc.\r\n \r\nGet professional services from our highly trained and qualified technicians who have been vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '454573048.jpg', '2020-03-27 12:23:06', '2020-03-27 06:53:06'),
(75, 'Bricklaying/Masonry Services', NULL, '2100286741.jpg', 'Our masons and bricklayers are trained to provide quality bricklaying works weather house building or home maintenance works including plastering, windows and doors installation and dressing. \r\n\r\nGet professional services from our highly trained and qualified Masons and Bricklayers who have been vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1705121663.jpg', '2020-03-27 12:19:14', '2020-03-27 06:49:14'),
(76, 'Air Conditioner Installation & Maintenance Services', NULL, '803478813.jpg', 'We have a good crop of technicians with detailed experience in servicing, maintaining and installing Air conditioning systems in home and office facilities covering stand-alone and central cooling systems.  We handle a whole range of brands effectively and professionally giving you comfort and convenience at home and work place.  \r\n\r\nWe provide one-off and long-term service maintenance contracts.', NULL, NULL, 0, 0, '1161391897.jpg', '2020-03-27 12:15:25', '2020-03-27 06:45:25'),
(77, 'Scaffolding Services', NULL, '773978023.jpg', 'Our scaffolding services include providing hardware, materials and manpower to install, manage and dismantle scaffolds at your project sites. We provide and mount safe and effective scaffold resources to enable you safely manage your construction works at heights. \r\n\r\nGet our safe and standardized scaffolds and resource persons who are highly trained and qualified with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1112292927.jpg', '2020-03-27 12:06:55', '2020-03-27 06:36:55'),
(78, 'POP Ceiling Installation & Maintenance Services', NULL, '802495765.jpg', 'Our aim is to give you a beautiful finish, a home and office that reflect your essence.  We have a huge inventory of pop ceiling types and professionals pop installation and maintenance technicians.', NULL, NULL, 0, 0, '792271728.jpg', '2020-03-27 12:05:57', '2020-03-27 06:35:57'),
(79, 'Painting Services', NULL, '652373875.jpg', 'We delight in painting you a delightsome home and office whether indoor or outdoor that reflects your essence.  We paint sections, whole and parts.  We experiment and wow you with our unconventional style, if you would let us, or keep it traditional as you may wish. \r\n\r\nGet professional painting services from our highly trained and qualified Painters whose backgrounds have been checked and vetted. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '724522788.jpg', '2020-03-27 12:04:28', '2020-03-27 06:34:28'),
(80, 'Interior Decoration Services', NULL, '1051902940.jpg', 'The beauty of your home and office is our priority, we install, we repair and maintain and supply all kinds of interior works and services at your facility. We have a huge network of first class interior designers who are a delight to work with. \r\n\r\nGet our Interior  home and office decoration services from our qualified Professionals  whose backgrounds have been checked and vetted. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1057263349.jpg', '2020-03-27 12:02:18', '2020-03-27 06:32:18'),
(81, 'Gardening & Outdoor Care Services', NULL, '1808417138.jpg', 'Our team of professional and verified Gardeners and exterior designers, have vast experience in gardening and outdoor service provision including horticulture and landscaping. We provide you best in class gardening and outdoor services for home, offices and commercial facilities. \r\n\r\nGet professional gardening and outdoor services from our highly trained and qualified professionals whose backgrounds have been checked and vetted. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '279503765.jpg', '2020-03-27 11:58:05', '2020-03-27 06:28:05'),
(82, 'Cleaning & Janitorial Services', NULL, '1206226467.jpg', 'A clean environment at home and in the office provides health and productivity. Our cleaning services are detailed and thorough provided by highly professional and verified Janitors using top of the art materials and machines. Let us make that unique difference in your home and offices. \r\n\r\nGet professional cleaning and janitorial services from our highly trained and qualified Painters whose backgrounds have been checked and vetted. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '281341560.jpg', '2020-03-27 11:50:36', '2020-03-27 06:20:36'),
(83, 'Welding Services', NULL, '2060314224.jpg', 'Your hot works are best handled by our skilled and verified welding professionals. Be it joining of metals, repairs, fixes, fabrication and installation works or new welding projects.  Our welding professionals will meet your demands and exceed your expectations with a touch of excellence. \r\n\r\nGet exceptional services from our highly skilled and professional welders, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '2129154703.jpg', '2020-03-27 11:46:59', '2020-03-27 06:16:59'),
(84, 'Aluminium Installation & Repair Services', NULL, '1256159071.jpg', 'Aluminums frames and assets play critical roles in the make-up of our home and office facilities, our network and pool of Aluminum professionals offer world class aluminum fabrications, installations, repairs and maintenance services. \r\n\r\nUse our highly qualified technicians for your aluminum works. Get exceptional services from our highly skilled professionals, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '286022441.jpg', '2020-03-27 11:56:45', '2020-03-27 06:26:45'),
(85, 'Generator Installation & Maintenance Services', NULL, '2050590023.jpg', 'With our team of verified generator technicians and Engineering professionals, we offer best in class generator installations of any brand or capacity; carry out repairs, maintenance and servicing. We are also able to take on your new power project with high level of customer satisfaction.\r\n\r\nGet your power needs met, use exceptional services from our highly skilled professionals, who are trained and vetted with their backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '822287761.jpg', '2020-03-27 11:44:50', '2020-03-27 06:14:50'),
(86, 'Solar Panel & Inverter Installation & Maintenance Services', NULL, '1950124207.jpg', 'Our network of alternative power supply professionals provides Solar and Inverter alternatives. We install, maintain and repair all types of inverters and solar panels for homes and offices ensuring that you have 24 hour power supply. \r\n\r\nGet exceptional services from our highly skilled professionals, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '30678899.jpg', '2020-03-27 11:43:53', '2020-03-27 06:13:53'),
(87, 'Home & Office Movers (Packing, Moving & Relocation Services)', NULL, '1636681698.jpg', 'Moving household and office items within the city and inter-city can be a big challenge. We provide professional home moving services where your items are well packaged and protected to prevent breakages or damages.  We also set your items at your new location.  We provide you stress-free home and office moving solutions. \r\n\r\nGet exceptional services from our highly skilled and professional home and office movers. Let’s take the stress off you while you enjoy your comfort. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1250098518.jpg', '2020-03-27 11:42:25', '2020-03-27 06:12:25'),
(88, 'Fumigation & Pests Control Services', NULL, '1880403639.jpg', 'Getting rid of pets, rodents and reptiles from our homes and working environment can be difficult. Our network of service providers and professionals can take these worries off you. With the use of the right methods and materials, we can effectively rid your space of pests, rodents and reptiles; restore your peace and comfort. \r\n\r\nGet exceptional services from our highly skilled and professionals, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '2042770308.jpg', '2020-03-27 11:40:23', '2020-03-27 06:10:23'),
(89, 'Tiling Installation', NULL, '2021106565.jpg', 'Our vastly experienced and verified professional Tillers will render quality tiling services that are second to none for all your tiling works for homes, offices, or new building projects, whether it is floor tiles, wall tiles, minor or major tiling works. We bring tiling solutions to your door steps and comfort. \r\n\r\nGet exceptional services from our highly skilled and professional Tillers, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '521002362.jpg', '2020-03-27 11:38:08', '2020-03-27 06:08:08'),
(90, 'Signage Making Serrvices', NULL, '68851669.jpg', 'We have a large network of signage making and installation professionals, helping to advertise and provide visibility for your services and location. \r\n\r\nGet exceptional services from our highly skilled and professional welders, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.', NULL, NULL, 0, 0, '1199530557.jpg', '2020-03-27 11:35:48', '2020-03-27 06:05:48'),
(91, 'Cable Tv Services', NULL, '40662371.jpg', '<div>We bring the joy, fun and entertainment to your living spaces and offices.  We partner with cable Tv service providers to manage your home entertainment needs providing all range of cable Tv services covering hardware installations, subscription services, and maintenance.</div><div><br></div><div>  \r\n\r\nGet exceptional services from our highly skilled and professional Cable Tv service providers, who are trained and vetted with backgrounds checked. Book an assessment and our Professionals will be with you within hours.</div>', NULL, NULL, 0, 0, '256181385.jpg', '2020-03-27 11:34:18', '2020-03-27 06:04:18'),
(92, 'Waste Management Services', NULL, '341120654.jpg', 'provide\r\nwaste management services for individuals and corporate entities.  We\r\nhave a large pool of service providers and professionals who are well\r\nresourced to provide world-class waste management services to\r\nstand-alone homes, estates and streets. We provide one-off and\r\nlong-term service maintenance contracts.  \r\n\r\n<p>Get\r\nexceptional waste management services from our highly skilled and\r\nprofessional waste managers who are trained and vetted with\r\nbackgrounds checked. Book an assessment and our Professionals will be\r\nwith you within hours</p>', NULL, NULL, 0, 0, '1772707681.jpg', '2020-03-27 11:33:27', '2020-03-27 06:03:27'),
(93, 'Facilities & Estate Management Services', NULL, '2074149806.jpg', 'We\r\nare specialist in managing your building asset and facilities. \r\nTenants and occupants take care of their area of occupancy often\r\nleaving the general or shared space to waste and unkempt. Paintings,\r\nwaste management and disposal, outdoor care are often left unattended\r\nand building and assets quickly dilapidate.  We offer overall\r\nfacilities management and care covering every aspect of the home\r\nmaintenance services.\r\n<p>We\r\nprovide one-off and long-term service maintenance contracts.  \r\n\r\n</p><p>\r\nGet\r\nexceptional facility management services, let’s take the worries\r\noff you with our highly skilled and professional facilities managers\r\nwho are trained and vetted with backgrounds checked. Book an\r\nassessment and our Professionals will be with you within hours\r\n\r\n</p>', NULL, NULL, 0, 0, '1059123660.jpg', '2020-03-30 12:31:59', '2020-03-30 07:01:59'),
(94, 'Computer Networking & CCTV Services', NULL, '113614929.jpg', '<p>We install, maintain and repair all computer networks in home and offices to ensure seamless local and wide area networking and communication, delivering value and ensuring maximum uptime.<br>Get professional services from our highly trained and qualified Networking Engineers who have been vetted with background checked. Book an assessment and our Professionals will be with you within hours. <br><br><br><br></p>', NULL, NULL, 0, 0, '1643223029.jpg', '2020-04-06 11:05:42', '2020-04-06 05:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0=active',
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `title`, `image`, `is_delete`, `status`, `description`, `created_at`, `updated_at`) VALUES
(35, 'Your reliable Home & Office Maintenance Partners.', '1712890381.jpeg', 0, 0, 'Skilled and trained Technicians with backgrounds checked. Up to N100,000 in damage cover. 100% money-back guarantee. We are only just a click away!', '2020-04-22 13:22:47', '2020-04-22 07:52:47'),
(36, 'Your reliable Home & Office Maintenance Partners.', '1307361373.jpeg', 1, 0, 'Skilled and trained Technicians with backgrounds checked. Up to N100,000 in damage cover. 100% money-back guarantee. We are only just a click away!', '2020-03-27 12:30:36', '2020-03-27 07:00:36'),
(37, 'Your reliable Home & Office Maintenance Partners.', '1652494583.jpeg', 0, 0, 'Skilled and trained Technicians with backgrounds checked. Up to N100,000 in damage cover. 100% money-back guarantee. We are only just a click away!', '2020-03-25 11:47:23', '2020-03-25 06:17:23'),
(38, 'sss', '242617211.jpg', 1, 0, 'ssssddddddvs', '2020-02-24 05:43:37', '2020-02-24 00:13:37'),
(39, 'Your Reliable Home & Office Maintenance Partners!', '440239496.jpeg', 0, 0, 'Skilled and trained Technicians with backgrounds checked. Up to N100,000 in damage cover. 100% money-back guarantee. We are only just a click away!', '2020-03-25 06:03:44', '2020-03-25 06:03:44'),
(40, 'erewr', '1471039895.jpg', 1, 0, 'werewrwerw', '2020-04-09 11:14:10', '2020-04-09 05:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `parent_category` varchar(100) NOT NULL,
  `sub_category` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `parent_category`, `sub_category`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(9, '64', 'Test sub categoryfdsf', 0, 1, '2020-01-17 09:27:41', '2020-01-17 03:57:41'),
(10, '1', 'Repairs & Fixes [Sockets, Switches, Lamp Holders, etc.]', 0, 0, '2020-01-17 03:57:27', '2020-01-17 03:57:27'),
(11, '1', 'Electricity Breakdown', 0, 0, '2020-01-17 03:58:12', '2020-01-17 03:58:12'),
(12, '1', 'Electrical Wiring', 0, 0, '2020-01-17 03:58:26', '2020-01-17 03:58:26'),
(13, '1', 'Electrical Installation', 0, 0, '2020-01-17 03:58:34', '2020-01-17 03:58:34'),
(14, '1', 'Major Electrical Project', 0, 0, '2020-01-17 03:58:48', '2020-01-17 03:58:48'),
(15, '1', 'Others…', 0, 0, '2020-01-17 04:00:21', '2020-01-17 04:00:21'),
(16, '71', 'Refrigerator Repair & Installation', 0, 0, '2020-01-17 04:05:35', '2020-01-17 04:05:35'),
(17, '71', 'Electric Cooker Repair & Installation', 0, 0, '2020-01-17 04:05:47', '2020-01-17 04:05:47'),
(18, '71', 'Microwave Repair & Installation', 0, 0, '2020-01-17 04:05:55', '2020-01-17 04:05:55'),
(19, '71', 'TV Repair & Installation', 0, 0, '2020-01-17 04:06:05', '2020-01-17 04:06:05'),
(20, '71', 'Fan Repairs', 0, 0, '2020-01-17 04:06:14', '2020-01-17 04:06:14'),
(21, '71', 'Washing Machine Repairs & Installation', 0, 0, '2020-01-17 04:06:23', '2020-01-17 04:06:23'),
(22, '71', 'Computer Repair & Installation', 0, 0, '2020-01-17 04:06:34', '2020-01-17 04:06:34'),
(23, '71', 'Others…', 0, 0, '2020-01-17 04:06:45', '2020-01-17 04:06:45'),
(24, '72', 'Repair & Fixes', 0, 0, '2020-01-17 04:09:32', '2020-01-17 04:09:32'),
(25, '72', 'Water Leakages', 0, 0, '2020-01-17 04:09:40', '2020-01-17 04:09:40'),
(26, '72', 'Pipe/Tap Fitting', 0, 0, '2020-01-17 04:09:49', '2020-01-17 04:09:49'),
(27, '72', 'Hot Water System', 0, 0, '2020-01-17 04:10:01', '2020-01-17 04:10:01'),
(28, '72', 'Evacuation of Septic Tanks & Soak-away', 0, 0, '2020-01-17 04:10:12', '2020-01-17 04:10:12'),
(29, '72', 'Clearing of Blocked Drains', 0, 0, '2020-01-17 04:10:21', '2020-01-17 04:10:21'),
(30, '72', 'New Installation Services', 0, 0, '2020-01-17 04:10:34', '2020-01-17 04:10:34'),
(31, '72', 'New Plumbing Project', 0, 0, '2020-01-17 04:10:43', '2020-01-17 04:10:43'),
(32, '72', 'Others…', 0, 0, '2020-01-17 04:10:52', '2020-01-17 04:10:52'),
(33, '73', 'Repair & Fixes', 0, 0, '2020-01-17 04:15:11', '2020-01-17 04:15:11'),
(34, '73', 'Furniture Repair & Fixes', 0, 0, '2020-01-17 04:15:28', '2020-01-17 04:15:28'),
(35, '73', 'Door Handle Repair & Fixes', 0, 0, '2020-01-17 04:15:55', '2020-01-17 04:15:55'),
(36, '73', 'Wardrobe refitting and repairs or installation', 0, 0, '2020-01-17 04:16:43', '2020-01-17 04:16:43'),
(37, '73', 'Kitchen Cabinet Installation & Repairs', 0, 0, '2020-01-17 04:17:15', '2020-01-17 04:17:15'),
(38, '73', 'New Carpentry Project', 0, 0, '2020-01-17 04:17:24', '2020-01-17 04:17:24'),
(39, '73', 'Other Woodwork…', 0, 0, '2020-01-17 04:17:32', '2020-01-17 04:17:32'),
(40, '74', 'Leaking Roof Repairs', 0, 0, '2020-01-17 04:26:31', '2020-01-17 04:26:31'),
(41, '74', 'Repair and Replace Damaged Ceilings', 0, 0, '2020-01-17 04:26:46', '2020-01-17 04:26:46'),
(42, '74', 'Repair and Replace Roof [Stone Coated Tiles]', 0, 0, '2020-01-17 04:27:31', '2020-01-17 04:27:31'),
(43, '74', 'New Roofing Project', 0, 0, '2020-01-17 04:27:42', '2020-01-17 04:27:42'),
(44, '74', 'Repair and Replace Roof [Aluminium Sheets]', 0, 0, '2020-01-23 11:09:20', '2020-01-23 05:39:20'),
(45, '74', 'Others…', 0, 0, '2020-01-23 11:10:01', '2020-01-23 05:40:01'),
(46, '75', 'Full House Plastering', 0, 0, '2020-01-17 04:38:48', '2020-01-17 04:38:48'),
(47, '75', 'Internal Plastering', 0, 0, '2020-01-17 04:39:01', '2020-01-17 04:39:01'),
(48, '75', 'External Plastering', 0, 0, '2020-01-17 04:39:18', '2020-01-17 04:39:18'),
(49, '75', 'General Mason Services', 0, 0, '2020-01-17 04:39:48', '2020-01-17 04:39:48'),
(50, '75', 'New Bricklaying and Masonry Project', 0, 0, '2020-01-17 04:39:59', '2020-01-17 04:39:59'),
(51, '75', 'Others…', 0, 1, '2020-01-17 10:13:17', '2020-01-17 04:43:17'),
(52, '75', 'Bricklaying/Masonry Serv', 0, 0, '2020-01-17 04:42:33', '2020-01-17 04:42:33'),
(53, '75', 'Installation of Doors/Windows', 0, 0, '2020-01-17 04:42:43', '2020-01-17 04:42:43'),
(54, '75', 'Dressing of Doors/Windows', 0, 0, '2020-01-17 04:42:53', '2020-01-17 04:42:53'),
(55, '75', 'Others…', 0, 0, '2020-01-17 04:43:07', '2020-01-17 04:43:07'),
(56, '77', 'Scaffold Hire', 0, 0, '2020-01-17 05:06:54', '2020-01-17 05:06:54'),
(57, '77', 'Scaffold Erection [Scaffolding]', 0, 0, '2020-01-17 05:07:07', '2020-01-17 05:07:07'),
(58, '77', 'Scaffold Couplers & Fitters', 0, 0, '2020-01-17 05:07:13', '2020-01-17 05:07:13'),
(59, '77', 'Others…', 0, 0, '2020-01-17 05:07:19', '2020-01-17 05:07:19'),
(60, '78', 'POP Design & Molding', 0, 0, '2020-01-17 05:10:19', '2020-01-17 05:10:19'),
(61, '78', 'POP Installation', 0, 0, '2020-01-17 05:10:32', '2020-01-17 05:10:32'),
(62, '78', 'New POP Project', 0, 0, '2020-01-17 05:10:42', '2020-01-17 05:10:42'),
(63, '78', 'Others…', 0, 0, '2020-01-17 05:10:47', '2020-01-17 05:10:47'),
(64, '78', 'POP Repairs', 0, 0, '2020-01-17 05:11:11', '2020-01-17 05:11:11'),
(65, '78', 'POP Replacement', 0, 0, '2020-01-17 05:12:20', '2020-01-17 05:12:20'),
(66, '79', 'Residential [Full House] Painting', 0, 0, '2020-01-17 05:15:51', '2020-01-17 05:15:51'),
(67, '79', 'Office [Full Painting]', 0, 0, '2020-01-17 05:16:07', '2020-01-17 05:16:07'),
(68, '79', 'Sectional/Touchup Painting', 0, 0, '2020-01-17 05:16:20', '2020-01-17 05:16:20'),
(69, '79', 'Exterior Painting', 0, 0, '2020-01-17 05:16:31', '2020-01-17 05:16:31'),
(70, '79', 'Interior Painting', 0, 0, '2020-01-17 05:16:43', '2020-01-17 05:16:43'),
(71, '79', 'Special Painting [Stucco etc.]', 0, 0, '2020-01-17 05:16:54', '2020-01-17 05:16:54'),
(72, '79', 'Decorative Painting [Schools, Hospitals, Corporate Bodies etc.]', 0, 0, '2020-01-17 05:17:06', '2020-01-17 05:17:06'),
(73, '79', 'New Painting Project', 0, 0, '2020-01-17 05:17:18', '2020-01-17 05:17:18'),
(74, '79', 'Others…', 0, 0, '2020-01-17 05:17:56', '2020-01-17 05:17:56'),
(75, '80', 'Fix Curtains', 0, 0, '2020-01-17 05:28:36', '2020-01-17 05:28:36'),
(76, '80', 'Fix Blinds', 0, 0, '2020-01-17 05:28:52', '2020-01-17 05:28:52'),
(77, '80', 'Wall Papers', 0, 0, '2020-01-17 05:29:06', '2020-01-17 05:29:06'),
(78, '80', 'Home and Office Decoration', 0, 0, '2020-01-17 05:29:16', '2020-01-17 05:29:16'),
(79, '80', 'Event Decoration', 0, 0, '2020-01-17 05:29:28', '2020-01-17 05:29:28'),
(80, '80', 'Outdoor Decoration', 0, 0, '2020-01-17 05:29:37', '2020-01-17 05:29:37'),
(81, '80', 'Others…', 0, 0, '2020-01-17 05:29:42', '2020-01-17 05:29:42'),
(82, '81', 'Gardening', 0, 0, '2020-01-17 05:33:47', '2020-01-17 05:33:47'),
(83, '81', 'Lawn Care/Mowing', 0, 0, '2020-01-17 05:33:57', '2020-01-17 05:33:57'),
(84, '81', 'Hedge Cutting', 0, 0, '2020-01-17 05:34:11', '2020-01-17 05:34:11'),
(85, '81', 'Landscaping Design & Installation', 0, 0, '2020-01-17 05:34:22', '2020-01-17 05:34:22'),
(86, '81', 'Horticutural Works', 0, 0, '2020-01-17 05:34:32', '2020-01-17 05:34:32'),
(87, '81', 'Maintenance [Regular/Seasonal]', 0, 0, '2020-01-17 05:34:42', '2020-01-17 05:34:42'),
(88, '81', 'Holiday Lights & Décor', 0, 0, '2020-01-17 05:34:54', '2020-01-17 05:34:54'),
(89, '81', 'New Gardening Project', 0, 0, '2020-01-17 05:35:01', '2020-01-17 05:35:01'),
(90, '81', 'Others…', 0, 0, '2020-01-17 05:35:16', '2020-01-17 05:35:16'),
(91, '82', 'Home Cleaning Services', 0, 0, '2020-01-17 05:38:40', '2020-01-17 05:38:40'),
(92, '82', 'Janitorial/Office Cleaning', 0, 0, '2020-01-17 05:38:51', '2020-01-17 05:38:51'),
(93, '82', 'Pre-occupational Cleaning Services', 0, 0, '2020-01-17 05:39:00', '2020-01-17 05:39:00'),
(94, '82', 'Post Construction/Renovation Cleaning', 0, 0, '2020-01-17 05:39:07', '2020-01-17 05:39:07'),
(95, '82', 'Others…', 0, 0, '2020-01-17 05:39:13', '2020-01-17 05:39:13'),
(96, '83', 'Repairs & Fixes', 0, 0, '2020-01-17 05:41:54', '2020-01-17 05:41:54'),
(97, '83', 'Fabrication & Installation', 0, 0, '2020-01-17 05:42:02', '2020-01-17 05:42:02'),
(98, '83', 'New Welding Project', 0, 0, '2020-01-17 05:42:10', '2020-01-17 05:42:10'),
(99, '83', 'Others…', 0, 0, '2020-01-17 05:42:16', '2020-01-17 05:42:16'),
(100, '84', 'Aluminium Repair', 0, 0, '2020-01-17 05:45:06', '2020-01-17 05:45:06'),
(101, '84', 'Fabrication & Installation [Doors & Windows]', 0, 0, '2020-01-17 05:45:17', '2020-01-17 05:45:17'),
(102, '84', 'Aluminium Balcony/Utility', 0, 0, '2020-01-17 05:45:27', '2020-01-17 05:45:27'),
(103, '84', 'Mosquito Mesh Replacement', 0, 0, '2020-01-17 05:45:37', '2020-01-17 05:45:37'),
(104, '84', 'Aluminium Partition', 0, 0, '2020-01-17 05:45:50', '2020-01-17 05:45:50'),
(105, '84', 'Shifting&Alteration', 0, 0, '2020-01-17 05:45:57', '2020-01-17 05:45:57'),
(106, '84', 'New Aluminium Project', 0, 0, '2020-01-17 05:46:05', '2020-01-17 05:46:05'),
(107, '84', 'Others…', 0, 0, '2020-01-17 05:46:30', '2020-01-17 05:46:30'),
(108, '85', 'Generator Installations', 0, 0, '2020-01-17 05:52:47', '2020-01-17 05:52:47'),
(109, '85', 'Generator Repairs and Maintenance', 0, 0, '2020-01-17 05:52:56', '2020-01-17 05:52:56'),
(110, '85', 'Generator Servicing', 0, 0, '2020-01-17 05:53:08', '2020-01-17 05:53:08'),
(111, '85', 'New Power Project', 0, 0, '2020-01-17 05:53:19', '2020-01-17 05:53:19'),
(112, '85', 'Others…', 0, 0, '2020-01-17 05:53:27', '2020-01-17 05:53:27'),
(113, '87', 'Intra-city Packing and Moving', 0, 0, '2020-01-17 06:14:39', '2020-01-17 06:14:39'),
(114, '87', 'Intercity Packing and Moving', 0, 0, '2020-01-17 06:14:46', '2020-01-17 06:14:46'),
(115, '87', 'Home and Office Moves', 0, 0, '2020-01-17 06:14:54', '2020-01-17 06:14:54'),
(116, '87', 'Others…', 0, 0, '2020-01-17 06:15:21', '2020-01-17 06:15:21'),
(117, '88', 'General Pest Control', 0, 0, '2020-01-17 06:17:14', '2020-01-17 06:17:14'),
(118, '88', 'Rodent Control', 0, 0, '2020-01-17 06:17:26', '2020-01-17 06:17:26'),
(119, '88', 'Termite Control', 0, 0, '2020-01-17 06:17:45', '2020-01-17 06:17:45'),
(120, '88', 'Others…', 0, 0, '2020-01-17 06:18:22', '2020-01-17 06:18:22'),
(121, '89', 'Wall Tiling [Home/Office]', 0, 0, '2020-01-17 06:20:47', '2020-01-17 06:20:47'),
(122, '89', 'Stairs & Alfresco Tiling', 0, 0, '2020-01-17 06:21:00', '2020-01-17 06:21:00'),
(123, '89', 'Floor Strip outs & Removalst', 0, 0, '2020-01-17 06:21:13', '2020-01-17 06:21:13'),
(124, '89', 'Sectional/Maintenance Tiling', 0, 0, '2020-01-17 06:21:23', '2020-01-17 06:21:23'),
(125, '89', 'Interlocking Outdoor [Repair & Install]', 0, 0, '2020-01-17 06:21:33', '2020-01-17 06:21:33'),
(126, '89', 'Concrete Stamp', 0, 0, '2020-01-17 06:21:45', '2020-01-17 06:21:45'),
(127, '89', 'New Tiling Projec', 0, 0, '2020-01-17 06:21:51', '2020-01-17 06:21:51'),
(128, '89', 'Floor Tiling [Home/Office]', 0, 0, '2020-01-23 11:15:18', '2020-01-23 05:45:18'),
(129, '89', 'Others…', 0, 0, '2020-01-23 11:15:33', '2020-01-23 05:45:33'),
(130, '90', 'Indoor & Outdoor Signage Services', 0, 0, '2020-01-17 06:26:34', '2020-01-17 06:26:34'),
(131, '90', 'Signage Design & Fabrication', 0, 0, '2020-01-17 06:26:45', '2020-01-17 06:26:45'),
(132, '90', 'Signage Installation', 0, 0, '2020-01-17 06:26:52', '2020-01-17 06:26:52'),
(133, '90', 'Others…', 0, 0, '2020-01-17 06:26:59', '2020-01-17 06:26:59'),
(134, '91', 'DSTV Repair & Installation', 0, 0, '2020-01-17 06:29:54', '2020-01-17 06:29:54'),
(135, '91', 'GOTV Repair & Installation', 0, 0, '2020-01-17 06:30:07', '2020-01-17 06:30:07'),
(136, '91', 'CAN Repair & Installation', 0, 0, '2020-01-17 06:30:19', '2020-01-17 06:30:19'),
(137, '91', 'STAR TIME Repair & Installation', 0, 0, '2020-01-17 06:30:29', '2020-01-17 06:30:29'),
(138, '91', 'Replacement & Fixes', 0, 0, '2020-01-17 06:30:38', '2020-01-17 06:30:38'),
(139, '91', 'Others…', 0, 0, '2020-01-17 06:30:51', '2020-01-17 06:30:51'),
(140, '92', 'Individual home waste removals', 0, 0, '2020-01-17 06:32:32', '2020-01-17 06:32:32'),
(141, '92', 'Corporate and Office waste management', 0, 0, '2020-01-17 06:32:46', '2020-01-17 06:32:46'),
(142, '92', 'Estate Waste management', 0, 0, '2020-01-17 06:32:58', '2020-01-17 06:32:58'),
(143, '92', 'Others…', 0, 0, '2020-01-17 06:33:05', '2020-01-17 06:33:05'),
(144, '93', 'Building and office complex', 0, 0, '2020-01-17 06:34:52', '2020-01-17 06:34:52'),
(145, '93', 'Shopping facilities and malls', 0, 0, '2020-01-17 06:35:01', '2020-01-17 06:35:01'),
(146, '93', 'Estate Maintenance & Management', 0, 0, '2020-04-06 11:24:14', '2020-04-06 05:54:14'),
(147, '86', 'Solar Panel/Inverter Repairs', 0, 0, '2020-01-23 05:30:08', '2020-01-23 05:30:08'),
(148, '86', 'Solar Panel/Inverter Maintenance', 0, 0, '2020-01-23 05:30:32', '2020-01-23 05:30:32'),
(149, '86', 'Solar Panel/Inverter Installation', 0, 0, '2020-01-23 05:30:42', '2020-01-23 05:30:42'),
(150, '86', 'Others…', 0, 0, '2020-01-23 05:30:52', '2020-01-23 05:30:52'),
(151, '76', 'Air Conditioner Repair', 0, 0, '2020-01-23 05:34:04', '2020-01-23 05:34:04'),
(152, '76', 'Air Condition Servicing (With Gas filling).', 0, 0, '2020-01-23 05:34:20', '2020-01-23 05:34:20'),
(153, '76', 'Air Condition Servicing (Without Gas filling).', 0, 0, '2020-01-23 05:34:36', '2020-01-23 05:34:36'),
(154, '76', 'Air Condition Installation', 0, 0, '2020-01-23 05:34:49', '2020-01-23 05:34:49'),
(155, '76', 'Industrial Cooling & Air Conditioning System', 0, 0, '2020-01-23 05:34:59', '2020-01-23 05:34:59'),
(156, '76', 'Others…', 0, 0, '2020-01-23 05:35:05', '2020-01-23 05:35:05'),
(157, '94', 'Home Network Installation', 0, 0, '2020-03-04 09:12:41', '2020-03-04 09:12:41'),
(158, '94', 'Office Network Installation', 0, 0, '2020-03-04 09:12:54', '2020-03-04 09:12:54'),
(159, '94', 'Repair of Faulty Network', 0, 0, '2020-03-04 09:13:05', '2020-03-04 09:13:05'),
(160, '94', 'Network Upgrade', 0, 0, '2020-03-04 09:13:22', '2020-03-04 09:13:22'),
(161, '94', 'Major Network Project', 0, 0, '2020-03-04 09:13:33', '2020-03-04 09:13:33'),
(162, '94', 'CCTV Installation and Maintenance', 0, 0, '2020-04-06 11:17:28', '2020-04-06 05:47:28'),
(163, '94', 'Others.', 0, 0, '2020-04-06 11:17:58', '2020-04-06 05:47:58'),
(164, '93', 'Others', 0, 0, '2020-04-06 11:24:42', '2020-04-06 05:54:42'),
(165, '94', 'Give brief description of services required.', 0, 1, '2020-04-06 11:28:18', '2020-04-06 05:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(233) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '0=admin 1=user 2=provider',
  `expire_link` varchar(233) DEFAULT NULL,
  `reset_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_create` datetime DEFAULT NULL,
  `phone_no` varchar(50) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `zip_code` varchar(250) DEFAULT NULL,
  `notification_token` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `varify_token` varchar(70) DEFAULT NULL,
  `varify_status` int(11) NOT NULL DEFAULT '0',
  `account_activate` int(11) NOT NULL DEFAULT '0' COMMENT '0=deactivate account ',
  `city` varchar(256) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `skill_category` varchar(200) DEFAULT NULL,
  `overview` text,
  `location` int(11) DEFAULT NULL,
  `is_approved` tinyint(4) NOT NULL DEFAULT '0' COMMENT '	0=bydefault 1= accept 2=reject	',
  `email_otp` int(11) DEFAULT NULL,
  `email_otp_status` int(11) DEFAULT '0',
  `email_verified` int(11) DEFAULT '0',
  `profile_updated` tinyint(4) DEFAULT '0',
  `terms` int(11) NOT NULL DEFAULT '0',
  `facebook_id` varchar(250) DEFAULT NULL,
  `provider` varchar(233) DEFAULT NULL,
  `twitter_id` varchar(255) DEFAULT NULL,
  `google_id` int(11) DEFAULT NULL,
  `provider_id` varchar(256) DEFAULT NULL,
  `entity_type` int(11) DEFAULT NULL COMMENT '0=individual 1=corporate',
  `street` varchar(80) DEFAULT NULL COMMENT 'address',
  `area` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `expire_link`, `reset_status`, `created_at`, `updated_at`, `link_create`, `phone_no`, `gender`, `address`, `image`, `zip_code`, `notification_token`, `status`, `is_delete`, `varify_token`, `varify_status`, `account_activate`, `city`, `document`, `skill_category`, `overview`, `location`, `is_approved`, `email_otp`, `email_otp_status`, `email_verified`, `profile_updated`, `terms`, `facebook_id`, `provider`, `twitter_id`, `google_id`, `provider_id`, `entity_type`, `street`, `area`) VALUES
(1, 'Ojo Akin-Longe', 'ogaworkman@getnada.com', '$2y$10$2Y8QEi/ZOeAQhpAnitSqY.UNKwgMl0E4E2yfKlaHz6zbw/tS4fcXW', 0, '', 0, '2019-12-04 10:12:25', '2020-04-06 14:10:08', '0000-00-00 00:00:00', '08187759009', 'male', '34 Old Aba Road, Rumuobiakanni', '874470822.jpg', NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'test', 'test@gmail.com', '$2y$10$vfRNfrY2sJ5sYgRmdt3nl.ZzNpyzZNeXjGA8WTYEQbQO9jp2skpcS', 0, '', 0, '2019-12-04 11:26:55', '2019-12-04 05:56:55', '0000-00-00 00:00:00', '', '', '', '', NULL, NULL, 0, 1, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'xaa', 'xaa@gmail.com', '$2y$10$TuBglPL.gYhTfnAzHiJKcOmKvr0pQuAlNYoyyVOIaK7j0aOF7Ezb2', 1, NULL, 0, '2019-12-04 11:16:03', '2019-12-04 05:46:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'tester', 'test@getnada.com', '$2y$10$J2h2kBOqPlDIXb8ZPpdTXOyaXOuaHuWER2/Q61ThaEooZKxndrzwu', 1, NULL, 0, '2019-12-04 05:54:53', '2020-02-24 23:06:32', NULL, '3434343434', NULL, NULL, NULL, NULL, NULL, 0, 1, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'vinitaaa', 'aaa@mailinator.com', '$2y$10$W8YJ2jcYX2Yh189DBcLqSe/DwoxmnP.G9sYC2PCFZkmsFTfFsFYyW', 1, NULL, 0, '2019-11-18 18:30:00', '2019-12-08 23:39:29', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'aaaa', '123456@gmail.com', '$2y$10$zaRNokpZhtghyYLSoG3CU.26YGNWhv.XNt1OrjYZO56eQ7RNyyzO6', 1, NULL, 0, '2019-12-11 05:42:57', '2019-12-18 05:48:04', NULL, '1122334455', NULL, NULL, NULL, '123456', NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '123456', '12345ss16@gmail.com', '$2y$10$EkRz0/Sj9aktHMsXE5if4eSvTcZT5U/CcNyoXNa7KcyN7nKqUTnXK', 1, NULL, 0, '2019-12-11 05:45:39', '2019-12-11 05:45:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, '123456', '1234ddsd5ss16@gmail.com', '$2y$10$Q6CrSszv73ZjtN/GGXMHZODNkoEls8qHfdRTNoQtZPuxfVXDSY7B.', 1, NULL, 0, '2019-12-11 05:48:56', '2019-12-11 05:48:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, 'erwrwe', '1cc1@gmail.com', '$2y$10$V2U6rEIOepGBYT160nn6HOUmh/NjiG93IHFiRBZK2YYnIsg2YQQu6', 1, NULL, 0, '2019-12-11 06:17:39', '2019-12-11 06:17:39', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'qqwwee', '111111@gmail.com', '$2y$10$/4I.c4i5RZkgRG.2YkieIeZbXE6hWHQE0AB7zHCEsD99/4IyYHtXG', 1, NULL, 0, '2019-12-11 06:28:37', '2019-12-11 06:28:37', NULL, '1111111111', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'ffdfff', 'dfdf@gmail.com', '$2y$10$tBciBfV/9u811iKkDrR3Tuk68hA5CBaQPLxOCWP61zV9PvUDR/EBy', 1, NULL, 0, '2019-12-11 06:46:22', '2019-12-11 06:46:22', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'ffdfff', 'dfss444444df@gmail.com', '$2y$10$iWW0vyy55VY7lFZ2jBX6d.qHdk0AcbQhB6Uj.XZ5yPuLsZEHYvZfu', 1, NULL, 0, '2019-12-11 07:11:39', '2019-12-11 07:11:39', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'ffdfff', 'dfss444444444444df@gmail.com', '$2y$10$YDjPUDYunOhpvIMSK9XWY.G.gH5boGZQls5fCi8s9O6NdtQc25GcC', 1, NULL, 0, '2019-12-11 07:13:28', '2019-12-11 07:13:28', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'dog', 'dfss4444444df@gmail.com', '$2y$10$h6XJ/GHGarDti5lpZ4KDDObAbjmDT4JnXbpYGZRyw/S9DchNKTdvC', 1, NULL, 0, '2019-12-11 07:17:11', '2019-12-17 07:33:35', NULL, '1122334400', NULL, NULL, '1740983631.png', '123456', NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'vinita', '11@gmail.com', '$2y$10$zHEq8oUZjkDdXjOJpgoI6OdxoS/zazoIn3NnI4db7o97sEMrRIyVu', 1, NULL, 0, '2019-12-11 07:21:07', '2019-12-11 07:21:07', NULL, '1122334411', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'vinita', '1aa1@gmail.com', '$2y$10$XtkLYIb5noGUEnKMSMjjgu4Jila.ZugKGtWYNE6rIeKVV9dhV5KVu', 1, NULL, 0, '2019-12-11 07:22:07', '2019-12-11 07:22:07', NULL, '1122334411', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 'GDSG', 'xibuxo@getnada.com', '$2y$10$efkOzPoAuTwV80LLa1MSG.tllrM30NdB0mTiJr65pkHCHlej6okOq', 1, NULL, 0, '2019-12-11 08:57:48', '2019-12-31 00:57:15', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, 'kuluteh', 'kuluteh@getnada.com', '$2y$10$jS.xejhdKT5ihn47R8lCr.XiBSgC3mp2ebPhODrRRFYiwZZtV1446', 1, NULL, 0, '2019-12-12 04:22:46', '2019-12-12 04:22:46', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 'srffdsfd', 'dewahixe@getnada.com', '$2y$10$XPxtkMUn91XPQgDo75P.Des5KcwchzDiLQR4P/RLnwu2S4L8NH7qy', 1, NULL, 0, '2019-12-12 04:25:02', '2019-12-14 03:44:48', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, 'gfdtgd', 'gowewypi@getnada.com', '$2y$10$tss8UzDTDyqmN5Yinx/hJ.G4s5a443SfL4uKOqDKH5s27tdMjD6Xi', 1, NULL, 0, '2019-12-12 04:34:34', '2019-12-12 04:34:34', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'fdgfdgdfgdf', 'lymuf@getnada.com', '$2y$10$uq3cDFKq272baAdqEU6wre/vNRU/Fyu0cUCRZyVumb8M72ROPJMGe', 1, NULL, 0, '2019-12-12 04:52:25', '2019-12-14 03:17:21', NULL, '1122334455', NULL, 'aaaaaaaaaaaaaa', '1451193210.jpg', NULL, NULL, 0, 0, NULL, 1, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'fgffff', 'lary@getnada.com', '$2y$10$AKbvIXYt1Iqvczv0GLpxuezGlNcXfeyx0kyWoacHzIN3RxPaRW1he', 1, NULL, 0, '2019-12-14 02:52:26', '2019-12-14 05:22:34', NULL, '1122337890', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'dog2', 'tryhrty@gmail.com', '$2y$10$tpfyCXXi0RbnVISina7C8uDTViHujMKA4THAIj1EkVqk/kPd/OGrC', 1, NULL, 0, '2019-12-15 23:33:39', '2019-12-17 07:34:48', NULL, '1234567', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, 'htthtt', 'aa@gmail.com', '$2y$10$kUUTYcmYvz3wtQvbI1O92ODBCTj6Ph54kEEOcDBQsxIRzEcaSsdlO', 1, NULL, 0, '2019-12-15 23:40:35', '2019-12-17 07:34:30', NULL, 'errtrtr', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '123456', '12rssrr@gmail.com', '$2y$10$W5g1ExHUQgiYEytD8rHLGu9gVqSkP7tQ8ZF.GKFtg1jIFG/9jLkB2', 1, NULL, 0, '2019-12-15 23:48:45', '2019-12-15 23:48:45', NULL, '1234567', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(85, '123456', 'sdf@gmail.com', '$2y$10$kgJ3GZc5q5Wmvz2g/1nJ0uOFjzbvEcor0ugAcFsNx0pq0ggZwYtSO', 1, NULL, 0, '2019-12-15 23:50:06', '2019-12-15 23:50:06', NULL, '123456789012345', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '123456', 'serw@gmail.com', '$2y$10$ql4mgVqIcklb.3VDwkZhxeXOG0qUzggALi1qW3u57i9LsoKk2HAdS', 1, NULL, 0, '2019-12-15 23:51:07', '2019-12-15 23:51:07', NULL, '1234567', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'gghf', 'gowewffi@getnada.com', '$2y$10$O7ihmiE/0kwYacAm2J/Ey.5zE32/KecAScTWmu.bRC74cNc1Kl3iG', 1, NULL, 0, '2019-12-16 00:11:04', '2019-12-16 00:16:29', NULL, '1234567', 'male', 'weeegter', NULL, NULL, NULL, 1, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(88, 'dev', 'dev@gmail.com', '$2y$10$nuttm38Ggxq5KwFGU9HigulsEz8mG1H1lz3MWdEZ2/8lJj.2925tK', 1, NULL, 0, '2019-12-16 01:02:25', '2019-12-16 01:03:58', NULL, '1234567890', 'female', 'fhhfgh', '845433265.jpg', NULL, NULL, 1, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'grfhg', 'goweaawffi@getnada.com', '$2y$10$0tY8keeD1qMklWAxahYMdO4UKGzi9nT/CTOPUUNc1fB.iAjoKeO6q', 1, NULL, 0, '2019-12-16 02:10:08', '2019-12-16 02:10:08', NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, 'sdfdf', 'fsdf@gmail.com', '$2y$10$XjX4klbaoB9NZt3cERn9HOHCx1FsP.1j/URvqO9hQwVgPl2daftQS', 1, NULL, 0, '2019-12-16 02:23:54', '2019-12-17 02:12:22', NULL, '1234567890', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, 'zuzyhuh', 'zuzyhuh@getnada.com', '$2y$10$D/SPKFjDZrKB2fUgOCRz0uKcdIP.7OQrQUR7pk8OkP22COx98k1v6', 1, NULL, 0, '2019-12-16 03:37:18', '2019-12-16 03:37:18', NULL, '1122334455', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 'lary2', 'lary2@getnada.com', '$2y$10$k0b283ZdYPl7XLj0LVnYUeFUuEn7kfnLQgIHms3aBZxUW.u1QpIeK', 1, NULL, 0, '2019-12-17 05:15:42', '2019-12-23 01:14:13', NULL, '1122334455', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 1, 1, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, 'fgdgg', 'lary3@getnada.com', '$2y$10$yv5aWRrZhC9BixcCbloaGONfikmySzlEMwIcfIk19GEHDH8ZfRlLi', 1, NULL, 0, '2019-12-17 05:20:00', '2019-12-19 09:04:28', NULL, '1122334455', NULL, NULL, NULL, '123456', NULL, 0, 1, NULL, 1, 1, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, 'sadasd', 'narayan@getnada.com', '$2y$10$6faaCZ3xhTc54CJGn5yiP.Ys6vNOszG0CeqDBpCy0334mJDU8pYzW', 1, NULL, 0, '2019-12-18 06:56:12', '2019-12-18 08:38:44', NULL, '7852236987', NULL, NULL, NULL, '322201', NULL, 1, 0, NULL, 0, 0, NULL, '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, 'erewre', 'ogfff@getnada.com', '$2y$10$rDH/u0EzpkUHyuMxUd5qJ.k1iTJQRuX/7kxgAmP5i1p956/B/b7sa', 1, NULL, 0, '2019-12-18 09:22:47', '2019-12-18 09:22:47', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'bhl', '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, 'erewre', 'ossgfff@getnada.com', '$2y$10$ld2lb13Yfoo1LxAkNH95Vu4C9JOVdqK5mvNwnTPweiMlq84OCohLa', 2, NULL, 0, '2019-12-18 09:24:04', '2019-12-19 06:01:35', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, 'bhl', '', '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, 'www', 'ogarmen@getnada.com', '$2y$10$hzjFqLQMb.tGwB5.wYywy.BqGqCjCYpWmZdTuqjtMujV909iu8an2', 2, NULL, 0, '2019-12-19 00:34:36', '2020-02-26 01:43:52', NULL, '1122334433', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 0, 0, 'fffffffff', NULL, '30', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, 'fsdfdfds', 'gggman@getnada.com', '$2y$10$AQh5yW1XY0rbLu7ZvZy3bup1MlW9nRr/PjPHbdB205NzImApo6rqC', 2, NULL, 0, '2019-12-19 00:40:11', '2019-12-19 23:13:29', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, 'fghfghfg', NULL, '', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, 'dgfdg', 'ogaaan@getnada.com', '$2y$10$p46HieyXO9OepWCr3b0npes9rwFHyUfPHrFNEIY4NQBmmIN7PlGEy', 2, NULL, 0, '2019-12-19 00:52:45', '2020-03-06 00:47:15', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'fdhgfdhd', NULL, '1,71,72,73,75', NULL, NULL, 1, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, 'erewrwe', 'o11@getnada.com', '$2y$10$BnsvXrAw5M01K5.WTXjCduHSNkIih0wh4pZHMy4.tPi0cvWtUEmc2', 2, NULL, 0, '2019-12-19 00:54:42', '2020-02-26 01:44:07', NULL, '1122334455', NULL, NULL, '770041370.png', NULL, NULL, 0, 1, NULL, 0, 0, 'fdsfgds', NULL, '31', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'wdfwed', 'ogaddn@getnada.com', '$2y$10$ItHjT3FE7UPeK/9sbcRV/u8A7dEDzDhByY8Nd9y4KA7dHUnkaWRBe', 2, NULL, 0, '2019-12-19 05:42:01', '2020-04-21 06:23:44', NULL, '1122334455', NULL, NULL, '1339337793.jpg', NULL, NULL, 0, 0, NULL, 0, 0, 'dsad', '1190128391.jpg', '71,74', 'nmzsbh dgdf dbsadbsd fdbsdsfbds s dsfdsf rdgdgdf rgfd', NULL, 1, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(108, 'gettt', 'ogahh@getnada.com', '$2y$10$q47VEigwI6Ee3.nlck..ZeM9riF.aflQBfjY8tLA6I4kKioZugBD2', 2, NULL, 0, '2019-12-19 05:42:50', '2020-04-21 06:23:41', NULL, '1122334455', NULL, NULL, '1878623467.jpg', NULL, NULL, 0, 0, NULL, 0, 0, 'tghrtyhrt', '231281000.jpg', '90,92', NULL, NULL, 1, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, 'ewdewd', 'ogawff@getnada.com', '$2y$10$pXN7T9ufT/I9FwE4S5i74OJukpJuKniLYCcHlEYCzDxwn2iIurmiC', 2, NULL, 0, '2019-12-19 05:44:15', '2020-02-26 01:43:28', NULL, '1122334455', NULL, NULL, '83627812.jpg', NULL, NULL, 0, 1, NULL, 0, 0, 'qewdwed', '323055036.jpg', '30,31,34', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, 'weffee', 'ogaen@getnada.com', '$2y$10$4bolWFbv32eQlvUq9bx95um9dZn8QYWoppTDTpLoxwtYbcloT3Ily', 2, NULL, 0, '2019-12-19 05:53:48', '2020-02-26 01:43:24', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 0, 0, 'dsff', '863286479.jpg', '30,31,34', '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(111, 'dewfewf', 'ogffn@getnada.com', '$2y$10$mnVYpP.6xOVQxmSWlzGc8uMB/jPp1rf2S/1EMA.bU.CjUgb7fvzFG', 2, NULL, 0, '2019-12-19 05:55:50', '2020-04-21 06:23:38', NULL, '1122334455', NULL, NULL, '431480039.jpg', NULL, NULL, 0, 0, NULL, 0, 0, 'edsfdf', '343851902.png', '71', NULL, NULL, 1, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(112, 'fgdg', 'dojo@getnada.com', '$2y$10$3RLHh1JVCgYj59ihXRTXNelkFTfbTYDBIpZ68Gk6G9FEIjjd3DT0.', 1, NULL, 0, '2019-12-23 00:44:38', '2019-12-23 01:14:17', NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(113, 'yrtyt', 'raprru@getnada.com', '$2y$10$wwY/TE.U25FFpiHsz8SwD.nIXqV8I9iS.7hFK5SpCy3vk7U7J4A12', 1, NULL, 0, '2019-12-23 00:46:33', '2019-12-23 01:14:22', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(114, 'yhftgyh', 'faresyqi@getnada.com', '$2y$10$PjBhuttxnMG7E6rKWxVTXe8pC.rDmwbpMgmDhsWGt2Oqsax.qipu.', 1, NULL, 0, '2019-12-23 00:47:52', '2019-12-23 01:14:27', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(115, 'Narayan', 'narayan@devtechnosys.com', '$2y$10$e5Ib1B8bWv61A5./Q5b/ZOigHUQ0hkd/7eiy71TXnCrV4XIfetZ1q', 1, NULL, 0, '2019-12-23 01:46:25', '2019-12-23 01:51:02', NULL, '123456789', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(116, 'Narayan', 'narayan@mailinator.com', '$2y$10$kjYJoEE3LCnkdPGqD2oboO8yOIvf4nIpszFlx/j7j7mO09LrjIq1C', 1, NULL, 0, '2019-12-23 01:53:18', '2019-12-23 02:02:23', NULL, '12356789', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(117, 'Narayan', 'narayan1@mailinator.com', '$2y$10$/wJoZR8WePPe1pqWtok8AOCN44.FjsrgfJrfQAmOG1e1m3dPEK/0G', 1, NULL, 0, '2019-12-23 02:03:24', '2019-12-23 02:13:00', NULL, '123456789', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(118, 'rtgrgrg', 'rapuff@getnada.com', '$2y$10$Xzv6F2koyVssjm5EwTAAvu26BIMmFxkgMhngBECmeQDL16oScN1ye', 1, NULL, 0, '2019-12-23 08:59:08', '2019-12-23 08:59:08', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(119, 'fsfsdf', 'ssss@getnada.com', '$2y$10$x0m/Y/DNGjGfUAb7UYaeBu3yenn.q6yUWbUa4jn9OBVBpXycDh4Zq', 1, NULL, 0, '2019-12-23 09:03:58', '2019-12-24 00:02:42', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, 'dfsf', 'sasu@getnada.com', '$2y$10$2S2ed5afASZ4HQqIYHTaAuCjHy.m2Ry/vggHu/ffNQ.oLuuDGsHg.', 1, NULL, 0, '2019-12-23 23:21:05', '2019-12-23 23:59:21', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 1, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, 'dsads', 'diya@getnada.com', '$2y$10$7I3UHgE7QGNMfffyz4KnfuAAP/92Qz1TZFdhDR6jcNdc5sgGGWLmm', 1, NULL, 0, '2019-12-23 23:50:00', '2019-12-24 00:41:09', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, 'gdfg', 'test1@getnada.com', '$2y$10$7I3UHgE7QGNMfffyz4KnfuAAP/92Qz1TZFdhDR6jcNdc5sgGGWLmm', 1, NULL, 0, '2019-12-24 00:06:03', '2019-12-24 00:08:55', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, 'dsfsdf', 'riya@getnada.com', '$2y$10$oDWYa56pjJ6CfsQt1qiETOZHK4UJsMWrnRQk7d1HXnhzlC/vdqq4S', 1, NULL, 0, '2019-12-24 00:18:04', '2019-12-24 00:52:54', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, 'qqqq', 'qqqq@getnada.com', '$2y$10$MVLrdxzbUP3GpeYQy9HO6uQ5AqguUhDbYpYr7GJDDnZC.V1g6vFKC', 1, NULL, 0, '2019-12-26 00:12:59', '2019-12-26 01:19:40', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, 'Amit', 'arora@mailinator.com', '$2y$10$VY7EpIDR4TMYOV2OFmQ4yOCKTsYdry1XK4nQbaEVK.yqIijgGgVRq', 1, NULL, 0, '2019-12-26 01:44:44', '2019-12-26 01:58:08', NULL, '7877977', NULL, NULL, NULL, '302017', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, 'Kristi Sutton', 'taabeer@mailinator.com', '$2y$10$Stsv2fMXM88TlAGT90WOg.xe8QNWJ54Nx.RKHyxx0KfGTRYHFURmK', 1, NULL, 0, '2019-12-26 01:56:07', '2019-12-26 01:56:07', NULL, '22323233232323', NULL, NULL, NULL, '421113', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'eeee', 'eeee@getnada.com', '$2y$10$/Hjhz4URcCRANlqZAhUWFOEx9T/kQKjK5hwxg64722heU6e0bJuXK', 1, NULL, 0, '2019-12-26 02:00:41', '2019-12-26 02:00:41', NULL, '1122334455', NULL, NULL, NULL, '123455', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'ddd', 'aaaa@getnada.com', '$2y$10$nydndKBcAUBZSECcpVG4wOAP5zYoJpkM5yt9YV3h5tlNcirMS.wmO', 1, NULL, 0, '2019-12-26 02:03:38', '2019-12-26 02:03:38', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'dsfsdf', 'puxis@getnada.com', '$2y$10$gY0ZxX2d5Wmso7Iuq6iL7eHen4BKfN5mENKp4eTCd2zOfU2oJxOMi', 1, NULL, 0, '2019-12-26 02:06:10', '2019-12-26 02:06:10', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'fsdfsd', 'buxo@getnada.com', '$2y$10$IBF1DBYZlteQDMADH8mWC.mF7F3GtuOIcEslONV6Se3PNiBkH.wUq', 1, NULL, 0, '2019-12-26 02:10:12', '2019-12-26 02:10:12', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'fsrfsd', 'pigofib@getnada.com', '$2y$10$zz7B8QcPasG9NO7VEHOa5eiE7DdG4DZ4L.695nogQRRBNKH3hzXpG', 1, NULL, 0, '2019-12-26 02:16:38', '2019-12-26 02:16:38', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'gdfgdf', 'fdfd@gmail.com', '$2y$10$7bv5EyDIPTBpGTHj8SlW0OZ1cCW/me9UfZnT8FVXrfPLbI2.i5qo.', 1, NULL, 0, '2019-12-26 02:20:43', '2019-12-26 04:07:30', NULL, '11122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Qa user', 'devqa@getnada.com', '$2y$10$iK1zE7S4sgoUhLUesSfCbuoFRi8UyBCGBfmEi.QZ/cYwD2JiLHzN2', 1, NULL, 0, '2019-12-26 04:09:46', '2019-12-26 08:53:32', NULL, '1212121212', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'sdzadasd', 'devqa@gatnada.com', '$2y$10$/uZLjxKf7RX.icv7bwzEoer0W0v0RN4dREFThLh77I5e.wwY8IYBa', 1, NULL, 0, '2019-12-26 04:12:19', '2019-12-26 05:40:39', NULL, '123123123', NULL, NULL, '1196916208.png', '121232', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, 'cscasd', 'asdasd@asd.asd', '$2y$10$K683Y6nZJSx7hNWZ0hovtO.9JNee2FhHi9wAskoUv4gBzy1VPzgna', 1, NULL, 0, '2019-12-26 04:21:08', '2019-12-26 05:40:22', NULL, '3333333333', NULL, NULL, '2074949766.png', NULL, NULL, 0, 1, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'dsfgdf', 'asdasd@asda.asd', '$2y$10$Q2pYT/tVtLt22r.r3wBQJ.hQDEXBEYIIXFMZhLHfy52U4f3OaeGuS', 1, NULL, 0, '2019-12-26 04:38:26', '2019-12-26 05:36:26', NULL, '423423422342', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, 'asdasd', 'ada@asdasd.asdasd', '$2y$10$GCgbzo8xvDe3EDs/OCWSgOg1SeP0Xffi3gqTSpz5TOtXFl3dsnbl2', 1, NULL, 0, '2019-12-26 04:40:11', '2019-12-26 04:54:58', NULL, '23424242', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, 'asdasd', 'ASDASD@ASDAS.ASD', '$2y$10$bxDqtsHcSV9diCM/1xp/weNxoMyE4cak5cQYt.OJbNlxQ5Met4xZG', 1, NULL, 0, '2019-12-26 04:50:47', '2019-12-26 05:36:38', NULL, '23434342', NULL, NULL, NULL, '232323', NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, 'fdf', 'admin@gmail.com', '$2y$10$ytnZxGwRA3KsKPvqqRf3hu1EGeaHZrMpzGvuIjhccF7rXnWxr/AHi', 1, NULL, 0, '2019-12-26 05:51:50', '2019-12-26 05:51:50', NULL, '1122334455', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, 'asdasd', 'xerofib@getnada.com', '$2y$10$HKaRKQI36nr0sktRmUuViuyXluqF36onLMzi456LR.GwoURwfvcAi', 1, NULL, 0, '2019-12-26 09:05:08', '2019-12-26 09:10:01', NULL, '3333333', NULL, NULL, NULL, '333333', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, 'asdad', 'asdasd@asdasd.com', '$2y$10$48WftoiAGh4zUUNnYM2pAOkEo4E/XMdF5zaGsXG4Yh2sVu9dfae5C', 1, NULL, 0, '2019-12-27 08:00:14', '2019-12-27 08:00:14', NULL, '789456612311', NULL, NULL, NULL, '87894456', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 'rtrtyrt', 'ssqq@getnada.com', '$2y$10$aQ3AYQOevUUemRddwofdoeK1PYo4agog0onKdKdD61EzAqoDFPtMi', 1, NULL, 0, '2019-12-27 08:10:02', '2019-12-27 08:12:28', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 'Nitin', 'nitin.sharma1387@gmail.com', '$2y$10$hZeTTS01VM50JoFCDFhXou5TgVYAXH26H2htJQJO4qiKMWOPp2G5e', 1, NULL, 0, '2019-12-27 08:12:07', '2019-12-27 08:12:56', NULL, '7894561230', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'retrt', 'tttt@getnada.com', '$2y$10$.S7Z7mlkLYH609.3IzytBOy2lG1WhCnYioc.CY/UziW7/ipKLLVzq', 1, NULL, 0, '2019-12-27 08:13:44', '2019-12-27 08:14:05', NULL, '1122334455', NULL, NULL, NULL, '112233', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Kumar Divya', 'kumar@getnada.com', '$2y$10$cSzZIINxhhwC1H2l08vvY.3DZ6RgAcdJg7VqABmDyAuhhblb6o586', 1, NULL, 0, '2019-12-27 08:25:53', '2019-12-27 08:26:56', NULL, '523663256', NULL, NULL, NULL, '145632444444', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'test😀', 'test😀@mail.com', '$2y$10$NgY0nHDOQZ5p/NH.1wHhTuSUzTydAYBNa02GmoVQaQ3gqsI.Y.QtO', 1, NULL, 0, '2019-12-27 08:29:39', '2019-12-27 08:29:39', NULL, '7894561230', NULL, NULL, NULL, '123', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'asd asd sad sad asdsad sad sa sadasd', 'sadasdsadasdasdsadadsadadasdd@asdad.com', '$2y$10$Td5VL5pZcxMRwf88zAuQpufx5Z6nPWaxmVKDcVajecVvnCDo2bY0e', 1, NULL, 0, '2019-12-27 08:38:25', '2019-12-27 08:38:25', NULL, '789456123012345', NULL, NULL, NULL, '123456789123', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'dsadsadsadsadsadads dsadsadsadsadsadadsdsadsadsad5', 'asdsadsddsad@dasdadsa.com', '$2y$10$.07/4avkDr1RxUAbA/UGFuKK0yClSTnqhkWaFxMhAOEjmZDQ444Ve', 1, NULL, 0, '2019-12-27 08:42:47', '2019-12-27 08:42:47', NULL, '789456123', NULL, NULL, NULL, '123456', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'asdadasdasdasdsadasdasad', 'asdadasda@asdsadsad.cm', '$2y$10$CiMxfYfdAoHoWmqAPSk4s.PImGI8tQs1/6BzmMpZmJCbKiFU1LDH.', 1, NULL, 0, '2019-12-27 08:46:31', '2019-12-27 08:46:31', NULL, '7845645464', NULL, NULL, NULL, '12321212', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(150, 'ahkjvahkjvdhkavdhavdhjavdh', 'vahjdvahdvahdva@ada.dad', '$2y$10$gshIzuQCjr5/5APMsspLJOI2J9xZKc09Z0hEmAkiMVYe8.6pZgxpS', 1, NULL, 0, '2019-12-30 07:56:05', '2019-12-30 07:56:05', NULL, '3424234234', NULL, NULL, NULL, '2342423', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '111222', '111222@getnada.com', '$2y$10$TC9yoCF3xB.lRk5GmLPebehaF9vamliGLtRQC28GoFhXsWpo5jnA6', 1, NULL, 0, '2019-12-30 08:13:55', '2019-12-30 08:13:55', NULL, '111222111222', NULL, NULL, NULL, '111222', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'asdasdas,dadasdasdasdasdasdas,dadasdasdasd', 'ADASDADS@asdasd.asdad', '$2y$10$rMQ0KG8ok.aI3hVmbKaOaOICbDwDf3DtiBaH3C7nmu1AFx9i846Yi', 1, NULL, 0, '2019-12-30 08:17:58', '2019-12-30 08:17:58', NULL, '24323424', NULL, NULL, NULL, '234234234', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'adjabsdjbaajksdbajsdbajdbajkasbdkjbajkdbj', 'bakjsdbsakjdbadas@asdsbdajd.asdasd', '$2y$10$tefUcPirEv1LX6p3yfU4KOuENAwGGfkXJi0tg2hsng.ikX43QPIlW', 1, NULL, 0, '2019-12-30 08:18:39', '2019-12-30 08:18:39', NULL, '234234234234', NULL, NULL, NULL, '234234234', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'abcd', 'abcd@getnada.com', '$2y$10$wLossVlnq8NnEz.JoGKBDuIvLIMfJ/2INapPyZogoRR.8EawbkbbS', 1, NULL, 0, '2019-12-31 00:25:43', '2019-12-31 00:30:19', NULL, '11223344', NULL, NULL, NULL, '112233445566', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'ferfer', 'ss@gmail.com', '$2y$10$hjxoKN/7FbG1UJNJm2fTiep6YO.wdJSh8EMcoRRNiilElyOYVOtRy', 1, NULL, 0, '2019-12-31 00:27:35', '2019-12-31 00:27:35', NULL, '112233444', NULL, NULL, NULL, '112233445566', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'adsad', 'addasd@asda.dfrwr', '$2y$10$.AORrYxCVfRJyYf6As6vceIqr1ZixxVreZjckrSjRmV1C/PSSi8f6', 1, NULL, 0, '2019-12-31 02:14:19', '2019-12-31 02:14:19', NULL, '34123424', NULL, NULL, NULL, '23423423', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'kja dkj akjd akjd akjd akjd akjd', 'dsafasdad@adasd.asd', '$2y$10$Is2tJli3ePvKMU3Tzl5P7.XJA362W0bxTzltw2qzUU.2UVikWePNG', 1, NULL, 0, '2019-12-31 02:15:13', '2019-12-31 02:15:13', NULL, '2222222', NULL, NULL, NULL, '222222', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'devqa', 'chatqa@getnada.com', '$2y$10$oIyJYA4DYGeVT8gMXZxIgOg.8OMKJpZi7SBR4r/bzcGoAm5FWD5iO', 1, NULL, 0, '2019-12-31 02:20:06', '2019-12-31 02:20:06', NULL, '2323232323', NULL, NULL, NULL, '232323', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'asdasd', 'asdad@sadf.adfa', '$2y$10$.ijkJEN/eBt3vMetdqshX.7X5j.36N1tLbJUcMBIJdPjcX8.ge8.y', 1, NULL, 0, '2019-12-31 05:19:38', '2019-12-31 06:50:36', NULL, '4234234', NULL, NULL, '609311596.png', '2342342', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, '', NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'user', 'user@getnada.com', '$2y$10$7UDAEGO/LXK8ZDpAvBeL0e5guh7U98NbaOwfj3aZqW6zKcDQufpdG', 1, NULL, 0, '2020-01-24 23:47:58', '2020-04-22 07:03:27', NULL, '7742616737', NULL, 'Bhilwara, Rajasthan, India', NULL, '123456', 'aedce1b7-65c3-4ffd-a1e3-b1581cd93b53', 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(166, 'Shdhhehd', 'akc1234@getnada.com', '$2y$10$oFSSUDI2fyVcVN4Ezk.VFO87MYej27M6NemW0EHQi36rYW7/d0W0W', 1, NULL, 0, '2020-02-05 04:12:07', '2020-02-05 04:12:17', NULL, '89599595', NULL, NULL, NULL, '5665595', NULL, 0, 0, NULL, 1, 1, 'Jaipur  Rajasthan', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Teatee', 'hha@getnada.com', '$2y$10$rF66cL/Sl3WXEbTB6dq9WuGGW6Q.7W.uo3mui2D5tU8PgcBidgANy', 1, NULL, 0, '2020-02-05 04:23:56', '2020-02-05 04:23:57', NULL, '1234567858', NULL, NULL, NULL, '313001', NULL, 0, 0, NULL, 0, 0, 'Udaipur', NULL, NULL, NULL, NULL, 0, 1234, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Tester', 'testy@getnada.com', '$2y$10$u/VU5WSohMi7XgKd5AHL9eoDo.fuqfIaVd6t0Wt2RQ43i.VuwUZfS', 1, NULL, 0, '2020-02-05 05:01:36', '2020-02-05 05:01:37', NULL, '353535353533', NULL, NULL, NULL, '313001', NULL, 0, 0, NULL, 0, 0, 'USA', NULL, NULL, NULL, NULL, 0, 1234, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Testry', 'tu@getnada.com', '$2y$10$sTEvsT0uunOUYJRtgq2IteGSvhfJKbnIYXU4JzTRDm.mYi9f04uJi', 1, NULL, 0, '2020-02-05 05:04:11', '2020-02-05 06:30:22', NULL, '25896314755', NULL, NULL, NULL, '313001', NULL, 0, 0, NULL, 0, 0, 'Udaipur', NULL, NULL, NULL, NULL, 0, 1234, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Ehhehehe', 'akcccc@getnada.com', '$2y$10$WzZ.7PYs61PbqEkwYISgKeqiYjXuWm5hEq3HXiNfoKZHvAlkXqjVq', 2, NULL, 0, '2020-02-05 06:38:13', '2020-04-03 06:53:46', NULL, '89899595', NULL, NULL, NULL, '89989895', NULL, 0, 0, NULL, 1, 1, 'Gopalbari, Jaipur, Rajasthan 302016, India', NULL, '76', NULL, NULL, 1, 1234, 1, 0, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'Praveen Tiwari', 'tum@getnada.com', '$2y$10$C.juvNnIhHdvuNGUwIy9/uPv/ORdZkdL8RYJEk2dClhI2RO8xvcpW', 2, NULL, 0, '2020-02-05 07:15:07', '2020-02-05 07:15:07', NULL, '25896555555', NULL, NULL, NULL, '313001', NULL, 0, 0, NULL, 0, 0, 'Gopalbari, Jaipur, Rajasthan 302016, India', '9387.pdf', '73', NULL, NULL, 1, 1234, 1, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Haha', 'hh@getnada.com', '$2y$10$/Dl20y/5LrxJpu3RWjd9Oeb/sRfywgXtQYE6xzcBgJ32l2cJpyXHi', 1, NULL, 0, '2020-02-05 07:30:10', '2020-02-05 07:30:29', NULL, '2582582586', NULL, NULL, NULL, '313001', NULL, 0, 0, NULL, 1, 1, 'Udaipur', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'Test', 'ndl@mailinator.com', '$2y$10$Z.FRQp5UolKeEwQGc6ND2umBlgXdKPl9mhX.j74C.Y8hRxejEev/m', 2, NULL, 0, '2020-02-06 08:56:32', '2020-02-25 00:33:49', NULL, '123456789', NULL, NULL, '1322832596.jpg', '302017', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', NULL, '73', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'Ojo Akin-Longe', 'Ojo.Akinlonge@gmail.com', '$2y$10$l5BG7kYgz.FplXn1Xjs/suXDZMEsED.fxhms1RqFXCmFZ9pfoK922', 1, NULL, 0, '2020-02-06 14:00:11', '2020-02-06 14:13:48', NULL, '08187759009', NULL, NULL, NULL, '500102', NULL, 0, 0, NULL, 1, 1, 'Port harcourt', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Jasvir', 'jasvir@richestsoft.in', '$2y$10$W6y3RDJYYsz5WT0NLU4iD.mY.FRdjN2zggBpLlEcTdz3T8445vtB2', 1, NULL, 0, '2020-02-12 06:40:43', '2020-02-12 06:40:43', NULL, '123456789', NULL, NULL, NULL, '166053', NULL, 0, 0, NULL, 0, 0, 'Mohali', NULL, NULL, NULL, NULL, 0, 1234, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'Jasvir', 'jasvir74312@gmail.com', '$2y$10$DUQlKVJe./5IKdfhMi2d9uhPKNz3HZU5gmpeUMmQQEY67Yqa3iXPy', 1, NULL, 0, '2020-02-12 06:41:44', '2020-02-12 06:41:44', NULL, '9646874315', NULL, NULL, NULL, '166053', NULL, 0, 0, NULL, 0, 0, 'Mohali', NULL, NULL, NULL, NULL, 0, 1234, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Jessica Simpson', 'geogatedproject66@gmail.com', '$2y$10$yfUEzNJZCuFjJG8xDg9ZUe87ljssGb54OWmWuwTygo/nNgpcz5qca', 1, NULL, 0, '2020-02-17 17:20:19', '2020-02-17 17:20:19', NULL, '9876543234', NULL, 'jameson street, 123', NULL, '12344', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Praveen test', 'testg@getnada.com', '$2y$10$uP5xkMbEoNnq5uH5KeFDoOk.M4Eb2aKmKH/7gh1hDUIZPVQlGVZPO', 1, NULL, 0, '2020-02-21 07:50:02', '2020-02-21 07:50:25', NULL, '651456156464646', NULL, 'Jaipur, Rajasthan, India', NULL, '313101', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'QA user', 'bosi@getnada.com', '$2y$10$xpsj16MhEg9ndw5IkHS9ZehxJJHNgiwTLRG6n5eSJBUVgu7G7e/0m', 1, NULL, 0, '2020-02-22 05:53:49', '2020-02-24 00:24:21', NULL, '2342423', NULL, 'JAIPUR', NULL, '323', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'ASAS', 'ASASAS@SDFS.DF', '$2y$10$4cOwHe2pkeJ/8GZpyKAyDeLBrYKdiJxza9XN4IWiKMGINVKUQAVOq', 1, NULL, 0, '2020-02-22 05:55:16', '2020-02-24 00:11:50', NULL, '2222222', NULL, 'Asad Gate Bus Stand, Mirpur Road, Dhaka, Bangladesh', '772312834.jpg', '222', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'a sd asd sd', 'asdad@asd.ad', '$2y$10$Vq1DLZdhASXvejDNw0X/r.R8WsUmITHj8VRQqRONaxLc0ovOGpvwy', 1, NULL, 0, '2020-02-24 00:25:04', '2020-02-24 00:25:04', NULL, '23421234', NULL, 'asm,df am,sd ad ,as da smda d ad', NULL, '132321', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'asdasd', 'asdasdasdada@asda.dasd', '$2y$10$iIS2CYXrxOD9VmoI7HV9DOrU.gPL16K9xwP.Pui4I/6VOUdAVbWSK', 1, NULL, 0, '2020-02-24 00:28:59', '2020-03-06 01:25:05', NULL, '333333333333333', NULL, 'asdasdasdasdasdasdasddasdasdadadadaddasdasdsadasssasdasdasdasdasdasdasddasdasdadadadaddasdasdsadasssasdasdasdasdasdasdasddasdasdadadadaddasdasdsadasssasdasdasdasdasdasdasddasdasdadadadaddasdasdsadasss', NULL, '333333333333', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'tester', 'testyw@getnada.com', '$2y$10$4n3BahCMAsuZzutLXz.4bu9KzUpSbxs19bzQKgtC.Ik1DDpwqxh5O', 1, NULL, 0, '2020-02-24 23:10:58', '2020-02-25 02:23:22', NULL, '1325649875', NULL, 'jaipur', '1441987237.jpg', '313001', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'Praveentiwari', '99praveentiwari@gmail.com', NULL, 1, NULL, 0, '2020-02-25 03:41:21', '2020-02-27 05:22:37', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, '955207944', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'hjari lal', 'ogaworkhman@getnada.com', '$2y$10$B.GdUgYd4NGebVAKOYsSGepddGFjXJXNYtii81nHai7b0G9RSarJq', 2, NULL, 0, '2020-02-26 01:42:49', '2020-02-26 01:43:59', NULL, '1122334455', NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, 0, 0, 'jaipur', NULL, '1', NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'Abhi Sharma', NULL, NULL, 1, NULL, 0, '2020-02-27 05:18:56', '2020-02-27 05:18:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, '260074071656833', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'Praveen Tiwari', '92samsung29@gmail.com', NULL, 1, NULL, 0, '2020-02-27 05:19:37', '2020-02-27 05:26:30', NULL, '1234567890', NULL, 'Jaipur Rajastha', NULL, NULL, NULL, 0, 1, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, '2443144759269589', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Dev', 'technosysdev2019@gmail.com', NULL, 1, NULL, 0, '2020-02-29 03:43:01', '2020-02-29 03:43:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, '1164781827266994176', NULL, NULL, NULL, NULL, NULL),
(199, 'Jonathan', 'jonathanfaker123@gmail.com', NULL, 1, NULL, 0, '2020-03-01 12:13:57', '2020-03-01 12:13:57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, '1002017933671', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'Kumar Divya Singh', 'oga101@mailinator.com', '$2y$10$wheDG83wwiBVVffjJbs59uOEb.yYacVWMt3VcOygV6D/rBQ.QAmSm', 2, NULL, 0, '2020-03-06 03:08:45', '2020-04-03 06:53:35', NULL, '8946807101', NULL, NULL, NULL, '64979', NULL, 0, 0, NULL, 0, 0, 'Jaipur, Rajasthan, India', '1583483924.pdf,1583483924.pdf,1583483925.pdf', '74', NULL, NULL, 1, 1234, 1, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Test', 'oga102@mailinator.com', '$2y$10$ML.Y.kKxmcR4RiJRmkGf9uLMmvWc2R4ynS8a3b3L9MjVnv9xb90w2', 2, NULL, 0, '2020-03-06 03:13:04', '2020-03-16 05:39:29', NULL, '8946807102', NULL, NULL, NULL, '55856', NULL, 0, 0, NULL, 0, 0, 'Jaipur, Rajasthan, India', '1583484183.pdf', '72', NULL, NULL, 1, 1234, 1, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'Vinita Prajapati', 'oga103@mailinator.com', '$2y$10$OfnwH1HwgLZeFVXUxkYYIuxtuKGd3ilr4iJuPsdDelvxz.DbDnuXa', 2, NULL, 0, '2020-03-06 03:16:20', '2020-03-06 03:26:54', NULL, '8946807103', NULL, NULL, '1583484595.jpg', '12232', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '1583484379.pdf,1583484379.pdf,1583484380.pdf', '73', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(203, 'Amit', 'oga104@mailinator.com', '$2y$10$etkEY4ZU.tAM/jo79fjOqeeGjH7XUKccYZErtGEkFC2oGD9NjN/va', 2, NULL, 0, '2020-03-06 03:32:24', '2020-03-06 03:56:32', NULL, '8946807104', NULL, NULL, NULL, '59599', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '1583485343.pdf,1583485344.pdf,1583485344.pdf', '72', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'Tarun Saini', 'oga105@mailinator.com', '$2y$10$a/Eb1pl3bqq3XmmAUhXc6erxkBoVKUxYhxbmh/0a9dUMmL4WQvTMW', 2, NULL, 0, '2020-03-06 03:53:02', '2020-03-06 05:40:41', NULL, '8946807102', NULL, NULL, NULL, '5467', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '1583486581.doc,1583486581.pdf', '72', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'Narayan', 'oga107@mailinator.com', '$2y$10$RJpeidiOraVvs0JjG/faiOuaqwuwvoeJOPjjsG5Id3UQlj5ImXGAa', 2, NULL, 0, '2020-03-06 04:12:47', '2020-03-06 04:43:21', NULL, '8946807107', NULL, NULL, NULL, '50058', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', 'a0dbce05f29d325c79a0042b9eba0338.pdf,a0dbce05f29d325c79a0042b9eba0338.doc,b3a7764c1a817257bb33c11b77d05c53.pdf', '71', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'Akin Longe Ojo Eshovo', 'ojo.akin-longe@tndpressltd.com', '$2y$10$2Ek/A1aAPAV.l0l8X2ZvQ.uSX.DjEA7LKooVLgvxRthoKAh8KSzOm', 1, NULL, 0, '2020-03-06 13:55:22', '2020-04-21 04:12:03', NULL, '08187759009', NULL, NULL, NULL, '500102', 'c83811da-c558-4d97-8850-6c3a6257ea81', 0, 0, NULL, 1, 1, 'Port Harcourt', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(207, 'Toni', 'onesi.anthony@yahoo.com', '$2y$10$NAfV6sehBsY6daFUdngqV.1IZoLIUam3nO567prfQ1AGrHe//N65K', 1, NULL, 0, '2020-03-09 04:16:46', '2020-03-09 04:17:31', NULL, '63415496', NULL, '27 Bidwell Trail, Mississauga, ON, Canada', NULL, NULL, NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(208, 'Ayode Longe', 'aylonge@gmail.com', '$2y$10$SBawONRVHIX5bLND7ARE2O9bI6JhxLkEC1.2sO7TYNX.dTAZ3boO.', 1, NULL, 0, '2020-03-10 03:36:34', '2020-03-10 03:40:15', NULL, '2348023298628', NULL, '11 Ifelodun Street, Lagos, Nigeria', NULL, '100213', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(209, 'Istiyak Ansari', 'oga110@mailinator.com', '$2y$10$f5OFM/.qrknjzWECaISfduaF.6CgCJeRoZuYPXetXVDbRuktGjmqC', 2, NULL, 0, '2020-03-16 05:34:26', '2020-03-16 06:07:56', NULL, '8946807110', NULL, NULL, NULL, '6494', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '6404d6a1cd87e51aafb13a8df628010f.pdf,f8e76ce386530d3cc235d4306f5b832c.pdf,5548ead9a8b1d58d4fc0260bb91e137c.pdf', '74', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(210, 'Pushpendra', 'oga111@mailinator.com', '$2y$10$ZX5thIqK5XYvKHWjaPqVVOnx5ml3eT7XLd3yegj9Tkbq1APTUypBS', 2, NULL, 0, '2020-03-16 06:09:48', '2020-04-08 09:26:48', NULL, '79468071115', NULL, NULL, '15853244591095.jpg', 'Fffggg', 'c89a2d8e-de33-497e-9448-59955715d69b', 0, 0, NULL, 1, 1, 'Jawahar Circle, Malviya Nagar, Jaipur, Rajasthan 302017, India', '2b5ac8ff125414288f0ac6a911d3bc1d.pdf,65292a6e08bc99bffe02a31b1e3b521c.pdf', '72', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(211, 'Vinita prajapati', 'vinitaprajapati199@gmail.com', NULL, 1, NULL, 0, '2020-03-17 00:07:03', '2020-03-17 00:07:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, '109117567952161497330', NULL, NULL, NULL),
(214, 'Dev', 'technosysdev2019@gmail.com', NULL, 1, NULL, 0, '2020-03-17 00:17:22', '2020-03-17 00:17:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, '1164781827266994176', NULL, NULL, NULL),
(215, 'Ugochukwu Williams Nwaogu', 'ugodestiny2008@yahoo.com', '$2y$10$EiLBOjM1f5z6hX7uyt1KuOuoVOuF3XxA57L0qWHW0LRtaewHmMYNa', 1, NULL, 0, '2020-03-18 04:37:38', '2020-03-25 06:17:35', NULL, '2348068686676', NULL, 'Woji, Port Harcourt, Nigeria', NULL, NULL, NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, 'New user test', 'oga112@mailinator.com', '$2y$10$MYjTdAaVYQd4pjKc.Qrs0eQ1gg9qzOBRwauvEZ/zsmhAz1kkM9oCG', 2, NULL, 0, '2020-03-19 04:27:50', '2020-03-19 04:52:39', NULL, '8946807112', NULL, NULL, NULL, '9886', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '3ccb544ff60284667c821c39e3f0ba5a.doc,6a8f70f8116bd733b3e008820b41b662.docx', '73', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, 'Narayan', 'narayan123@getnada.com', '$2y$10$q8cruJRk9YqhbAb0q9i6yuFuNQGGAxJbqTcALhBBlAqO4qPfQ48GK', 1, NULL, 0, '2020-03-19 04:47:58', '2020-03-19 04:51:13', NULL, '79900798', NULL, 'Jaipur, Rajasthan, India', NULL, '302017', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(218, 'Oga 113', 'oga113@mailinator.com', '$2y$10$C/WP0ykYaS/DiFPENBdCU.7LTSLLp5Iq35T1PUYVb0jP39YNh2ExS', 2, NULL, 0, '2020-03-19 04:54:45', '2020-03-19 06:32:43', NULL, '8946807113', NULL, NULL, NULL, '6467', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', 'b14fba4c2d7d294f7d56da1ea13f83c9.doc,5ebd4bb4ae16e9ef74473a7e6217d691.docx', '1', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, 'test_oga', 'test_oga@getnada.com', '$2y$10$7zeRNcmYV9x8Lltst8Zxcuyz9aJjm.Pfknh6YT0TAMCroW7orW34G', 1, NULL, 0, '2020-03-19 05:58:45', '2020-03-19 06:17:37', NULL, '7742616737', NULL, 'Bhopal, Madhya Pradesh, India', NULL, '123456', NULL, 0, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(220, 'test_oga1', 'test_oga1@getnada.com', '$2y$10$jQebuVh4JqhfF4QrRG9Oiu1n3EsKN5/8ntYnia.ksmMKE/ZhLz2ZO', 1, NULL, 0, '2020-03-19 06:01:50', '2020-03-19 06:01:50', NULL, '4545545', NULL, 'Grand Canyon National Park, Arizona, USA', NULL, '45454545', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(221, 'Abhishek Sharma', 'oga114@mailinator.com', '$2y$10$hnxgLCOkURwDm2lUDMWFOOyE0K0aVzdRanQvMhxrOHKd7AKCdjl8i', 2, NULL, 0, '2020-03-19 06:36:15', '2020-03-19 06:40:21', NULL, '8946807114', NULL, NULL, NULL, '6464', 'f52dd5eb-515b-49ff-a518-5c8dd41c87ae', 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '102e8ebb29030b13d3f27e0148dc5f87.doc,e24584ecb4ac8448636c63ed4c253bf1.docx', '73', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(222, 'Albert', 'albert.abraham@devtechnosys.info', '$2y$10$NKqDNIeS9rQi1p9RudynIOyoOLuenfje2cXJ3lCNmuxHZltiucC.K', 2, NULL, 0, '2020-03-19 07:42:16', '2020-03-20 04:55:57', NULL, '7975906466', NULL, NULL, NULL, '335512', NULL, 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '98d065524eca92fd4e469b92168e3298.pdf', '71', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, 'Ogaworkman Ogaworkman', 'Ogaworkman@gmail.com', '$2y$10$OCZCyw2FOHC7mYw6e4D0nug1MuB7Ae8p4L5jYnqFePOOofXmnQYJa', 2, NULL, 0, '2020-03-19 11:15:41', '2020-04-18 14:05:21', NULL, '+2348187759009', NULL, NULL, NULL, '500102', '6aa4107c-0198-425f-b973-4773ed3af6d3', 0, 0, NULL, 1, 1, 'Port Harcourt, Nigeria', 'faf2dfeed1276d60812cf813222b7357.pdf', '93', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, 'Test', 'test1122@getnada.com', '$2y$10$8cGoItHBk.lZpT.Y.DDpz.VlG3XCN948JKHnLF7B.xw4QV9WUTdyO', 1, NULL, 0, '2020-03-20 04:38:49', '2020-03-20 04:39:30', NULL, '72347272', NULL, 'Jaipur, Rajasthan, India', NULL, '302017', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(225, 'Narayan Das', 'narayan@devtechnosys.com', NULL, 1, NULL, 0, '2020-03-20 08:29:49', '2020-03-20 08:29:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, 'google', NULL, NULL, '106074241112445762079', NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `expire_link`, `reset_status`, `created_at`, `updated_at`, `link_create`, `phone_no`, `gender`, `address`, `image`, `zip_code`, `notification_token`, `status`, `is_delete`, `varify_token`, `varify_status`, `account_activate`, `city`, `document`, `skill_category`, `overview`, `location`, `is_approved`, `email_otp`, `email_otp_status`, `email_verified`, `profile_updated`, `terms`, `facebook_id`, `provider`, `twitter_id`, `google_id`, `provider_id`, `entity_type`, `street`, `area`) VALUES
(226, 'dr willis', 'drwills@yahoo.com', '$2y$10$EQhz.h/aAN0nSx29rYePee.Nq6sxIrItTWMqpZsVgJNK.yB/VzPse', 1, NULL, 0, '2020-03-25 03:17:27', '2020-03-25 03:17:27', NULL, '08068676676', NULL, NULL, NULL, '2222', NULL, 0, 0, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(227, 'test', 'oga201@mailinator.com', '$2y$10$HYZBErAa95hfPdckb8.Nv.wvp./6UziQqkN10WjwlaUB32wBNRldC', 1, NULL, 0, '2020-03-26 10:51:30', '2020-03-29 15:23:27', NULL, '11100000001', NULL, NULL, NULL, '4564', NULL, 1, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(228, 'Anil Kumar', 'OGA202@MAILINATOR.COM', '$2y$10$15KclzrFuV1giDi3YrX.FuRmT5/P/HBw19HcDqcMH12NdZLggJRVS', 1, NULL, 0, '2020-03-26 11:04:26', '2020-03-26 11:10:42', NULL, '8946807201', NULL, NULL, NULL, '2323', NULL, 0, 0, NULL, 1, 1, 'Pratap Nagar, Jaipur, Rajasthan, India', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(251, 'Kumar Divya Singh', 'oga204@mailinator.com', '$2y$10$s321.KhK33bsNlTuM6A9NeZnMlt72Z0IjUe2cAFIGVBew8K1wwhJe', 1, NULL, 0, '2020-03-29 11:40:21', '2020-03-29 12:34:01', NULL, '8946807204', NULL, 'Jaipur Railway Station Main Entry, Gopalbari, Jaipur, Rajasthan, India', NULL, '125451', NULL, 1, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(252, 'Ajay', 'Oga205@mailinator.com', '$2y$10$9tPEZb2.ZjApnlROD957M.PfUlHhAxBkbGwuAjlhwQ6qVI5WODwKG', 1, NULL, 0, '2020-03-29 15:27:20', '2020-03-29 15:29:16', NULL, '8946807205', NULL, 'Ja', NULL, '34634', NULL, 1, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(253, 'test', 'oga@mailinator.com', '$2y$10$5gMS2JU2fHOv6NEx50wkDeblhW6JwCR8cxoPglQEOt65rSptCBEnS', 1, NULL, 0, '2020-03-29 15:31:28', '2020-03-29 15:31:28', NULL, '8946807206', NULL, 'Ja', NULL, '34345', NULL, 1, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, 5504, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(254, 'test 4', 'oga207@mailinator.com', '$2y$10$n/sqcrAtkLK4XSx8aJ.C5eo3Iulh9MbE/8RKMyy3NVQm23XuihYcO', 1, NULL, 0, '2020-03-29 15:35:53', '2020-03-29 15:38:04', NULL, '8946807207', NULL, 'Junction, Laheari Tola, Bhagalpur, Bihar 812002, India', NULL, '5465', NULL, 1, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, 'Test', 'oga208@mailinator.com', '$2y$10$yTv/zLTcYSjm1q1B5gorBePjsF8SmV3A5H9xHoc7z7ztPV3Yokfai', 1, NULL, 0, '2020-03-29 15:47:03', '2020-04-01 03:13:39', NULL, '8946807208', NULL, 'Ferozepur Road, Nishtar Town, Lahore, Punjab 54000, Pakistan', NULL, '6787', NULL, 1, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, 'tesrt user', 'oga209@mailinator.com', '$2y$10$tSwVin85xPb2WfyRHhIQkuvtP0ckG8sQmkAh3lfXeC8tQ6sKxYd6u', 1, NULL, 0, '2020-03-29 15:50:39', '2020-03-29 15:51:34', NULL, '8946807209', NULL, 'Kahalgaon, Bihar 813204, India', NULL, '45456', NULL, 1, 0, NULL, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(257, 'rttre', 'rr@gmail.com', '$2y$10$ID0.l5/.8FlDbz4egUIV0OO7tTYS.1tYquzCxOfkFsbBy3yznXEia', 2, NULL, 0, '2020-03-30 06:50:41', '2020-03-30 06:50:41', NULL, '344324243', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'tytytyy', '1638524700.jpg', '72', NULL, NULL, 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(258, 'dsfdsf', 'gg@gmail.com', '$2y$10$7xMJCBDaq8mzWfWVE1kUlOs3rvjx0Jp4ufbg6tRN7sSXWE8GSYh3.', 1, NULL, 0, '2020-03-30 06:58:31', '2020-03-30 06:58:31', NULL, '999999999977', NULL, NULL, NULL, '33432434', NULL, 0, 0, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(259, 'Ajay', 'oga101@getnada.com', '$2y$10$sNUrNb7kEC7.aMAPPH11O.dPZ/VyAhCMxi/FSeYt7V0oxyD5FJgka', 1, NULL, 0, '2020-03-30 09:32:42', '2020-03-30 09:33:26', NULL, '8946808101', NULL, 'India', NULL, '65445456', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(261, 'Ajay Shankar', 'Oga210@mailinator.com', '$2y$10$z0dcfJBuzunodacs1e2NHOXUz4EMYwlNInm6fz2co2Zx1MYcD1.0a', 1, NULL, 0, '2020-04-01 04:21:47', '2020-04-14 10:16:46', NULL, '8946807210', NULL, 'K.K.NAGAR, KK Nagar Rd, Ghatlodiya, Nirnay Nagar, Ahmedabad, Gujarat 380061, India', NULL, '123456', '01bcff83-050b-48f7-9680-10b2bf934a8d', 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(263, 'Heidi10319672', 'oga203@mailinator.com', '$2y$10$jXi9iTo7Y7Ly6tYKXZb2t./wIhaGbxVtWbNJqIEEFFpBVa5MsZHtu', 1, NULL, 0, '2020-04-01 05:16:40', '2020-04-02 13:29:36', NULL, '8946807203', NULL, 'Jaipur, Rajasthan, India', NULL, '64458', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, '1151818052901539800', NULL, NULL, NULL, NULL, NULL),
(267, 'Kumar Divya Singh', 'oga211@mailinator.com', NULL, 1, NULL, 0, '2020-04-02 11:50:56', '2020-05-07 10:08:44', NULL, '8946807211', NULL, 'Gopalbari, Jaipur, Rajasthan 302016, India', NULL, '81872', '01bcff83-050b-48f7-9680-10b2bf934a8d', 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, '2819477104834364', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(269, 'Amit Kumar', 'Oga212@mailinator.com', '$2y$10$GVTaRpa0TPp2b18JlueD7eyALTbFrvOL9POGaW4j4OT3jhoxbTvdy', 1, NULL, 0, '2020-04-02 13:49:53', '2020-04-02 14:00:51', NULL, '8946807212', NULL, 'Bhagalpur, Bihar, India', NULL, '54844451', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(270, 'Ankit', 'oga213@mailinator.com', '$2y$10$8DZcs4HqW3U.i0RIzvZs9OIjvZ005UTFm77dQDtJ.F/e01vqe2yjO', 1, NULL, 0, '2020-04-02 13:55:14', '2020-06-02 07:05:35', NULL, '8946807213', NULL, 'Kahalgaon, Bihar, India', NULL, '564757', NULL, 0, 1, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(271, 'Dev Sha', 'testingbydev@gmail.com', NULL, 1, NULL, 0, '2020-04-02 14:59:08', '2020-04-03 07:11:43', NULL, '89468900', NULL, 'Lakhisarai, Bihar, India', NULL, '88888', NULL, 0, 0, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, '1515031802032419', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(272, 'tttt', 'testittngbydev@gmail.com', '$2y$10$7MuC.iUx7/ag60vIXQg3aONjNYTUlDC6OYD7u7pEnO3OyD/Tef2AG', 2, NULL, 0, '2020-04-09 00:06:43', '2020-04-09 00:06:43', NULL, '656545656', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'gdgfdg', NULL, '72', NULL, NULL, 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(273, 'ggg', 'ggrytyyy@gmail.com', '$2y$10$ZWMlATq2vTMLl3FtiuT9aurg9nFx8jx64mCj.isMC0J67eaZYzXZq', 2, NULL, 0, '2020-04-09 00:08:14', '2020-04-09 00:08:14', NULL, '65465466', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'rrgrgre', NULL, '1', NULL, NULL, 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(274, 'albert abraham', 'albert.abraham@devtechnosys.info', NULL, 1, NULL, 0, '2020-04-09 05:29:54', '2020-04-09 05:29:54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, 'google', NULL, NULL, '116435320502262707831', NULL, NULL, NULL),
(275, 'ghhjh', 'hhhi@getnada.com', '$2y$10$QOe9e8MwpSRGcH5LmjyHb.9jovy6460D/S8NkL0kv9BU.GNGdVGX.', 1, NULL, 0, '2020-04-09 06:17:49', '2020-04-09 06:17:49', NULL, '34546454', NULL, 'ghjjjjjj', NULL, '4543545', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(276, 'ghhjh', 'hhhfi@getnada.com', '$2y$10$/vFhu3K2RnPr.5tX4WNlPOrhJaM6V7DzIPmbkAh7gTdQU2svvaTAS', 1, NULL, 0, '2020-04-09 06:24:13', '2020-04-09 06:24:13', NULL, '34546454', NULL, 'sfdggfdg', NULL, '4543545', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(277, 'efrgg', 'grgre@getnada.com', '$2y$10$eeuObjWSGiiFWuvoJ9kpXu4.cGFhIxacqf6wN15Zjutwy1Jkl0HWG', 1, NULL, 0, '2020-04-14 02:19:00', '2020-04-14 02:19:00', NULL, '4564645', NULL, 'fr rgrg', NULL, '3243432', NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(278, 'Rajan Kumar', 'OGA214@MAILINATOR.COM', '$2y$10$djjvnFdbW6dyZFVtpLWCTuRTgj7Hplyr7IHIb6bNjyL1rRVT.pMa2', 1, NULL, 0, '2020-04-14 07:49:23', '2020-04-14 08:03:49', NULL, '894807214', NULL, '2, Naharpur Village Rd, Institutional Area, Sector 3, Rohini, Delhi, 110085, India', NULL, '2345', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(279, 'Test', 'ojo@getnada.com', '$2y$10$dhoRUuziVd0eXx7JhDhXV./ja4f9JtCRI4yGzJqRKwtrHAIxCLzo6', 1, NULL, 0, '2020-04-17 08:48:41', '2020-04-17 08:49:43', NULL, '6757679', NULL, 'Testour, Tunisia', NULL, '1646', 'aedce1b7-65c3-4ffd-a1e3-b1581cd93b53', 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(280, 'Kumar Divya', 'oga120@mailinator.com', '$2y$10$VdcVe6n3tKnmGWOwWtLYG..VRMpIH5ANFLyjlfWElj53C9O04Zd/S', 2, NULL, 0, '2020-04-17 10:19:13', '2020-04-28 01:58:11', NULL, '8946807120', NULL, NULL, '248306805.phtml', '6868', 'c89a2d8e-de33-497e-9448-59955715d69b', 0, 0, NULL, 1, 1, 'Jaipur, Rajasthan, India', '0c417c0184fa6cf6ec7c3f9749f7263d.pdf', '71', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(281, 'Kumar Divya Customer', 'oga220@mailinator.com', '$2y$10$uD3S7Ym49YacCkbUIQOi5.mS1cLOV50eC7kv.sPOSJv2YWUKbC9QW', 1, NULL, 0, '2020-04-17 10:21:28', '2020-04-20 11:44:00', NULL, '8946807220', NULL, '89,raghunath puri 1 ,shoepur road,sanganer, pratap nagar, Tonk Rd, Maruti Nagar, Jaipur, Rajasthan 302033, India', NULL, '84949', NULL, 0, 0, NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(282, 'Ojo Akin-Longe', 'oakinlonge@yahoo.com', '$2y$10$bPZ1S4ObNH0nB7NP8HJRReuoMrM58e5S1Xrjc4HY6qdnQvu2Dh/Cm', 2, NULL, 0, '2020-04-19 06:35:32', '2020-05-22 05:05:27', NULL, '+2348187759009', NULL, NULL, NULL, '500201', NULL, 0, 0, NULL, 1, 1, 'Port Harcourt, Nigeria', NULL, '1', NULL, NULL, 1, NULL, 0, 1, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(283, 'Narayandas Lalwani', 'narayandas.lalwani@gmail.com', NULL, 1, NULL, 0, '2020-05-01 04:14:41', '2020-06-02 08:21:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, 0, 0, 0, NULL, 'facebook', NULL, NULL, '2874107889334875', NULL, NULL, NULL),
(284, 'ttt', 'hhh@getnada.com', '$2y$10$X76GIQ14mbgxqJWV5A1CPe59AAoiOFcPrfo8kdI/tV2SGLz3aISUK', 2, NULL, 0, '2020-06-04 04:48:43', '2020-06-04 04:48:43', NULL, '5666564546', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, 0, 0, 'fgh', '267686380.png', '73', NULL, NULL, 1, NULL, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'gjhjkl', 'hguewtje');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_price`
--
ALTER TABLE `booking_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_setting`
--
ALTER TABLE `global_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_acknowledgements`
--
ALTER TABLE `service_acknowledgements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_managemenets`
--
ALTER TABLE `service_managemenets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `booking_price`
--
ALTER TABLE `booking_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `global_setting`
--
ALTER TABLE `global_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `service_acknowledgements`
--
ALTER TABLE `service_acknowledgements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `service_managemenets`
--
ALTER TABLE `service_managemenets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

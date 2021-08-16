# login_using_otp
Build Login System with OTP using PHP &amp; MySQL
# Create database `loginotp`-`members`
CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authtoken` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
# Create database `loginotp`-`authentication`
CREATE TABLE `authentication` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `expired` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

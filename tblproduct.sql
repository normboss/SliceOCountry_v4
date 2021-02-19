--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `size` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `size`) VALUES
-- (1, 'FinePix Pro2 3D Camera', '3DcAM01', 'product-images/camera.jpg', 1500.00),
-- (2, 'EXP Portable Hard Drive', 'USB02', 'product-images/external-hard-drive.jpg', 800.00),
-- (3, 'Luxury Ultra thin Wrist Watch', 'wristWear03', 'product-images/watch.jpg', 300.00),
-- (4, 'XP 1155 Intel Core Laptop', 'LPN45', 'product-images/laptop.jpg', 800.00);
(1, 'Bread and Butter Pickles', 'PickleBreadButter8', 'images/pickle.png', 7, 8),
(2, 'Sour Pickles', 'PickleSour8', 'images/sour_pickle.png', 7, 8),
(3, 'Garlic Mustard Pickles', 'PickleGarlicMustard8', 'images/garlic_must_pickle.png', 7, 8),
(4, 'Salted Garlic Dill Pickles', 'PickleSaltedGarlicDill8', 'images/saltgarlic_dill.png', 7, 8),
(5, 'Zucchini Pickles', 'PickleZucchini8', 'images/zucchini_pickle_copy.png', 7, 8),
(6, 'Sassy Salsa', 'SalsaSassy8', 'images/sassy_salsa copy.png', 7, 8),
(7, 'Pickled Beets', 'PickleBeets8', 'images/beets_greens.png', 7, 8),
(8, 'Zucchini Relish', 'RelishZucchini8', 'images/zucchini8oz-relish.png', 7, 8),
(9, 'Ripe Cucumber Relish', 'RelishRipeCucumber8', 'images/cuke_relish.png', 7, 8),
(10, 'Applesauce', 'Applesause8', 'images/apple_sauce.png', 7, 8),
(11, 'Wild Maine Blueberry Jam', 'JamWildMaineBlueberry1_5', 'images/blueberry.jpg', 3.5, 1.5),
(12, 'Farm Fresh Strawberry Jam', 'JamFarmFreshStrawberry1_5', 'images/strawberry_8oz.jpg', 3.5, 1.5),
(13, 'Wild Maine Raspberry Jam', 'JamWildMaineRaspberry1_5', 'images/raspberry.png', 3.5, 1.5),
(14, 'Heirloom Rhubarb Jam', 'JamHeirloomRhubarb1_5', 'images/rhubarb_8oz.jpg', 3.5, 1.5),
(15, 'Strawberry Rhubarb Jam', 'JamStrawberryRhubarb1_5', 'images/strawrhubard300.jpg', 3.5, 1.5),
(16, 'Wild Maine Blueberry Jam', 'JamWildMaineBlueberry4', 'images/blueberry.jpg', 5, 4),
(17, 'Farm Fresh Strawberry Jam', 'JamFarmFreshStrawberry4', 'images/strawberry_8oz.jpg', 5, 4),
(18, 'Wild Maine Raspberry Jam', 'JamWildMaineRaspberry4', 'images/raspberry.png', 5, 4),
(19, 'Heirloom Rhubarb Jam', 'JamHeirloomRhubarb4', 'images/rhubarb_8oz.jpg', 5, 4),
(20, 'Strawberry Rhubarb Jam', 'JamStrawberryRhubarb4', 'images/strawrhubard300.jpg', 5, 4),
(21, 'Wild Maine Blueberry Jam', 'JamWildMaineBlueberry8', 'images/blueberry.jpg', 8.75, 8),
(22, 'Farm Fresh Strawberry Jam', 'JamFarmFreshStrawberry8', 'images/strawberry_8oz.jpg', 8.75, 8),
(23, 'Wild Maine Raspberry Jam', 'JamWildMaineRaspberry8', 'images/raspberry.png', 8.75, 8),
(24, 'Heirloom Rhubarb Jam', 'JamHeirloomRhubarb8', 'images/rhubarb_8oz.jpg', 8.75, 8),
(25, 'Strawberry Rhubarb Jam', 'JamStrawberryRhubarb8', 'images/strawrhubard300.jpg', 8.75, 8);


--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
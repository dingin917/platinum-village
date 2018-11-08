use f36ee;

insert into movie values 
(1, "Venom", "PG-13", 112, 7.0, "nowshowing", "Tom Hardy, Michelle Williams, Riz Ahmed, Scott Haze, Reid Scott",
"Ruben Fleischer", "Action", "04-10-2018", "English (Sub: Chinese)", 
"One of Marvel's most enigmatic, complex and badass characters comes to the big screen, starring Academy Award nominated actor Tom Hardy as the lethal protector Venom.", 
"http://www.venom.movie/site/", "/database/poster/venom.jpg"),

(2, "A Star Is Born", "M-18", 136, 8.4, "nowshowing", "Bradley Cooper, Lady Gaga",
"Bradley Cooper", "Romance", "04-10-2018", "English (Sub: Chinese)", 
"A Star is Born stars four-time Oscar nominee Bradley Cooper (American Sniper, American Hustle, Silver Linings Playbook) and multiple award-winning, Oscar-nominated music superstar Lady Gaga, in her first leading role in a major motion picture. Cooper helms the drama, marking his directorial debut. In this new take on the tragic love story, he plays seasoned musician Jackson Maine, who discovers and falls in love with struggling artist Ally (Gaga). She has just about given up on her dream to make it big as a singer until Jack coaxes her into the spotlight. But even as Ally's career takes off, the personal side of their relationship is breaking down, as Jack fights an ongoing battle with his own internal demons. ", 
"http://www.astarisbornmovie.net/", "/database/poster/astarisborn.jpg"),

(3, "First Man", "PG-13", 141, 7.7, "nowshowing", "Ryan Gosling, Claire Foy, Jason Clarke, Kyle Chandler, Patrick Fugit, Ciaran Hinds, Pablo Schreiber",
"Damien Chazelle", "Drama", "18-10-2018", "English (Sub: Chinese)", 
"On the heels of their six-time Academy Award-winning smash, La La Land, Oscar-winning director Damien Chazelle and star Ryan Gosling reteam for Universal Pictures's First Man, the riveting story of NASA's mission to land a man on the moon, focusing on Neil Armstrong and the years 1961-1969. A visceral, first-person account, based on the book by James R. Hansen, the movie will explore the sacrifices and the cost on Armstrong and on the nation of one of the most dangerous missions in history. ", 
"https://www.firstman.com/", "/database/poster/firstman.jpg"),

(4, "Searching", "PG-13", 103, 7.8, "nowshowing", "John Cho, Debra Messing, Joseph Lee, Michelle La",
"Aneesh Chaganty", "Thriller", "27-10-2018", "English (Sub: Chinese)", 
"After David Kim (John Cho)'s 16-year-old daughter goes missing, a local investigation is opened and a detective is assigned to the case. But 37 hours later and without a single lead, David decides to search the one place no one has looked yet, where all secrets are kept today: his daughter's laptop. In a hyper-modern thriller told via the technology devices we use every day to communicate, David must trace his daughter's digital footprints before she disappears forever. ", 
"http://www.searching.movie/site/", "/database/poster/searching.jpg"),

(5, "Johnny English Strikes Again", "PG", 89, 6.6, "nowshowing", "Rowan Atkinson, Olga Kurylenko, Ben Miller, Jake Lacy, Emma Thompson",
"David Kerr", "Action", "20-10-2018", "English (Sub: Chinese)", 
"Rowan Atkinson returns as the much-loved accidental secret agent in 'Johnny English Strikes Again'. When a cyber-attack reveals the identity of all active undercover agents in Britain, the country's only hope is called out of retirement. English's new mission is his most critical to date: Dive head first into action to find the mastermind hacker. A man with few skills and analogue methods, English must overcome the challenges of modern technology or his newest mission will become the Secret Service's last. ", 
"http://www.johnnyenglishmovie.com/", "/database/poster/johnnyenglish.jpg"),

(6, "Smallfoot", "PG", 97, 6.8, "upcoming", "Channing Tatum, James Corden, Zendaya, Common, LeBron James, Gina Rodriguez",
"Karey Kirkpatrick", "Animation", "27-11-2018", "English (Sub: Chinese)", 
"An animated adventure for all ages, with original music and an all-star cast, 'Smallfoot' turns the Bigfoot legend upside down when a bright young Yeti finds something he thought didn't exist a human. News of this 'smallfoot' brings him fame and a chance with the girl of his dreams. It also throws the simple Yeti community into an uproar over what else might be out there in the big world beyond their snowy village, in a rollicking story about friendship, courage and the joy of discovery. ", 
"https://trailers.apple.com/trailers/wb/smallfoot/", "/database/poster/smallfoot.jpg"),

(7, "Jimami Tofu", "PG", 121, 9.2, "upcoming", "Jason Chan, Mari Yamamoto, Rino Nakasone, Masane Tsukayama, Christian Lee",
"Jason Chan and Christian Lee", "Romance", "28-11-2018", "Japanese (Sub: English)", 
"A Chinese Singaporean chef formerly working in Tokyo, finds himself in Okinawa begging a disgruntled old chef to teach him traditional Okinawan food. A top Japanese food critic finds herself in Singapore on an eye opening discovery of Southeast Asian cuisine. In reality both are looking for each other after an emotional breakup years ago when she left him without a trace. Emotionally crippled by their breakup, he searches her hometown for her but discovers instead the art of traditional Okinawan food and her childhood best friend. Family secrets unravel and when she suddenly appears in Okinawa looking to find closure he cooks and serves her their final meal. Through it she discovers what she has been yearning for all these years. ", 
"https://vimeo.com/200626145", "/database/poster/jimami.jpg"),

(8, "The Happy Prince", "R-21", 100, 6.3, "upcoming", "Rupert Everett, Colin Firth, Emily Watson",
"Rupert Everett", "Drama", "11-11-2018", "English", 
"The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor. ", 
"https://www.youtube.com/watch?v=LKZqR1Zq98E&feature=youtu.be", "/database/poster/thehappyprince.jpg");



insert into showtime values 
(1,1,"2018-11-01","10:30"),
(2,1,"2018-11-02","22:30"),
(3,2,"2018-11-01","13:30"),
(4,2,"2018-11-02","19:30"),
(5,3,"2018-11-01","16:30"),
(6,3,"2018-11-02","16:30"),
(7,4,"2018-11-01","19:30"),
(8,4,"2018-11-02","13:30"),
(9,5,"2018-11-01","22:30"),
(10,5,"2018-11-02","10:30");

insert into member values
(1, 'Jennie', 'f36ee@localhost', 'Jennie Ting', md5('f36ee'));

insert into ticket_price values 
(NULL, 12.5, '2018-11-04');

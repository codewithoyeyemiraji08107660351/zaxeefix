<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>  Laptop and Phone - Service Center</title>
  <link rel ="icon" type="image/x-icon" href="./admin/asset/image/logo.jpg" >
  <link rel="stylesheet" href="./admin/asset/css/index.css">
  <link rel="stylesheet" href="./admin/asset/css/phone.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
  
  <nav class="navbar">
    <div class="navbar-left">
      <img src="./admin/asset/image/logo.jpg" alt="Company Logo" class="logo">
      <div class="company-info">
        <i class="fas fa-building"></i><p>Nosa HMH Plaza by Central Market off Ahmadu Bello Way, Kaduna</p>
        <div>
          <i class="fas fa-phone"></i><p>+234 8158469139, +234 9092146210</p>
        </div>
      </div>
    </div>
    <div class="navbar-right">
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
          <li class="dropdown">
                    <a href="#">Our Services</i></a>
                    <ul class="dropdown-content" style='background: rgba(0, 0, 51, 0.9);'>
                        <li><a href="laptop-repair.php" class="category-link">Laptop Repair</a></li>
                        <li><a href="phones-repair.php" class="category-link">Phone Repair</a></li>
                    </ul>
                </li>
          <li><a href="all-parts.php">All Parts</a></li>
          <li><a href="my-bookings.php">My Bookings</a></li>
       <li><a href="blog.php">Blog</a></li>
        <li><a href="contact.php">Contact</a></li>
      </ul>
     
    </div>
  </nav>

  <div class="banner">
  <div class="banner-content">
    <h1>Get Your Mobile Phone/iPhone Fixed At ZaxeeFix </h1>
  </div>
</div>
  
 <div class="form-container">
    <h2>Book Your Phones For Repair</h2>
  <form  id="repairForm"  action="process_booking.php" method="post">
    <div class="input-group">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="input-group">
      <label for="brands">Brands</label>
      <select name="brands" id="brands">
        <option value="dell">Dell</option>
        <option value="hp">HP</option>
        <option value="lenovo">Lenovo</option>
        <option value="apple-mac">AppleMac</option>
        <option value="iphone">iPhone</option>
        <option value="samsung">Samsung</option>
        <option value="tecno">Tecno</option>
        <option value="infinix">Infinix</option>
        <option value="itel">Itel</option>
        <option value="huwaii">Huwaii</option>
        <option value="acer">Acer</option>
      </select>
    </div>
    <div class="input-group">
      <label for="phone">Phone No.</label>
      <input type="number" id="phone" name="phone" required>
    </div>
    <div class="input-group">
      <label for="problem">Describe Your Phone Issues</label>
      <textarea name="problem" id="problem" rows="5"></textarea>
    </div>
    <button type="submit">Book Your Repair</button>
  </form>
</div>

    
   
  <div class="brands">
       <div class="logos">
    <div class = "logos-slide">
      <img src="https://th.bing.com/th/id/OIP.q7FjimDaxE2ZIrQAdXMgfgHaFj?w=212&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.Y7ypZrujTLvqQMPYUSMStgHaEZ?w=258&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.gpfmJgwsC_XJ3DXSJEaszgHaBc?w=347&h=68&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.79QrixzWGmiR3S8-8qp08gHaEK?w=294&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.ESmR14G9agagz8EEQK2bugHaHa?w=173&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.Gr922WdfHeWh09-pdbEWUAHaFW?w=250&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.1kzrBp1uQilR0vDdHFN2LAHaEo?w=242&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.2rti3VJ2pTAP8uQJkzXKMAHaHY?w=181&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.uqVNbrHh6oJP27jhYsl65AHaEo?w=269&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.qUAmeCRxrLUO4G5K6KjdxAHaEK?w=307&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.FJ-CoIhbj1gKT399Qk9GUwHaEs?w=309&h=196&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.gpfmJgwsC_XJ3DXSJEaszgHaBc?w=347&h=68&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.79QrixzWGmiR3S8-8qp08gHaEK?w=294&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.ESmR14G9agagz8EEQK2bugHaHa?w=173&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.Gr922WdfHeWh09-pdbEWUAHaFW?w=250&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.1kzrBp1uQilR0vDdHFN2LAHaEo?w=242&h=180&c=7&r=0&o=5&pid=1.7" alt="">
      <img src="https://th.bing.com/th/id/OIP.2rti3VJ2pTAP8uQJkzXKMAHaHY?w=181&h=180&c=7&r=0&o=5&pid=1.7" alt="">
    </div>
   </div>
  </div>

 
    <section class="questions">
      <div class="title">
        <h2>Frequently Ask Questions</h2>
      </div>
      <!--questions-->
      <div class="section-center">
        <!--single question-->
        <article class="question">
          <!--question title-->
          <div class="question-title">
            <p>What types of mobile issues do you repair?</p>
            <button type="button" class="question-btn">
              <span class="plus-icon">
                <i class="far fa-plus-square"></i>
              </span>
              <span class="minus-icon">
                <i class="far fa-minus-square"></i>
              </span>
            </button>
          </div>
          <!--question text-->
          <div class="question-text">
            <ul>
             <div>
               <i class="fa-solid fa-check"></i><li><strong>Screen Replacement: </strong>Cracked or broken screens restored to their original look and functionality.</li>
             </div>
             <div>
              <i class="fa-solid fa-check"></i> <li><strong>Battery Replacement:</strong> Replacement of degraded batteries to extend battery life and performance.</li>
             </div>
              <div>
                <i class="fa-solid fa-check"></i> <li><strong>Charging Port Repair:</strong> Fixing issues with charging ports to ensure proper charging and connectivity.</li>
              </div>
            <div>
               <i class="fa-solid fa-check"></i>  <li><strong>Camera Repair:</strong> Repairing or replacing front and rear cameras for clear, high-quality photos.</li>
            </div>
             <div>
               <i class="fa-solid fa-check"></i><li><strong>Water Damage Repair: </strong>Specialized treatments for devices exposed to water, restoring functionality where possible.</li>
             </div>
            <div>
              <i class="fa-solid fa-check"></i> <li><strong>Speaker and Microphone Repair:</strong> Fixing audio issues for clear sound during calls, music, and media.</li>
            </div>
              <div>
               <i class="fa-solid fa-check"></i> <li><strong>Motherboard Issues:</strong> Fixing onboard issues to optimize IC function</li>
              </div>
           <div>
              <i class="fa-solid fa-check"></i><li><strong>Software Issues:</strong> Troubleshooting and resolving software-related problems, including app crashes, operating system errors, and virus removal.</li>
           </div>
            </ul>
          </div>
        </article>
        <!--end single question-->

        <!--single question-->
        <article class="question">
          <!--question title-->
          <div class="question-title">
            <p>What types of Laptop issues do you repair?</p>
            <button type="button" class="question-btn">
              <span class="plus-icon">
                <i class="far fa-plus-square"></i>
              </span>
              <span class="minus-icon">
                <i class="far fa-minus-square"></i>
              </span>
            </button>
          </div>
          <!--question text-->
          <div class="question-text">
             <ul>
             <div>
               <i class="fa-solid fa-check"></i><li><strong>Screen Replacement </strong></li>
             </div>
             <div>
              <i class="fa-solid fa-check"></i> <li><strong>Battery Replacement</strong></li>
             </div>
              <div>
                <i class="fa-solid fa-check"></i> <li><strong>Charging Port Repair</strong></li>
              </div>
            <div>
               <i class="fa-solid fa-check"></i>  <li><strong>WebCamp Repair</strong></li>
            </div>
             <div>
               <i class="fa-solid fa-check"></i><li><strong>Liquid Damage Repair </strong></li>
             </div>
            <div>
              <i class="fa-solid fa-check"></i> <li><strong>Hard Disk Replacement</strong></li>
            </div>
              <div>
               <i class="fa-solid fa-check"></i> <li><strong>Keyboard Fixes and Replacement</strong></li>
              </div>
           <div>
              <i class="fa-solid fa-check"></i><li><strong>Laptop formatting and Software installations</strong></li>
           </div>
            </ul>
          </div>
        </article>
        <!--end single question-->

        <!--single question-->
        <article class="question">
          <!--question title-->
          <div class="question-title">
            <p>How long does a mobile repair take?</p>
            <button type="button" class="question-btn">
              <span class="plus-icon">
                <i class="far fa-plus-square"></i>
              </span>
              <span class="minus-icon">
                <i class="far fa-minus-square"></i>
              </span>
            </button>
          </div>
          <!--question text-->
          <div class="question-text">
            <p>The time required for mobile repair depends on the complexity of the issue. 
              Generally, most repairs can be completed within 24-48 hours. For more complex repairs, 
              such as water damage or component replacement, it may take slightly longer.</p>
          </div>
        </article>
        <!--end single question-->

        <!--single question-->
        <article class="question">
          <!--question title-->
          <div class="question-title">
            <p>Do you use original parts for mobile repairs?</p>
            <button type="button" class="question-btn">
              <span class="plus-icon">
                <i class="far fa-plus-square"></i>
              </span>
              <span class="minus-icon">
                <i class="far fa-minus-square"></i>
              </span>
            </button>
          </div>
          <!--question text-->
          <div class="question-text">
            <p>At Zaxefix, we prioritize quality in every repair. We use original and 
             Original Equipment Manufacturer parts based on availability and the customer’s budget.

This allows us to provide flexible options without compromising on the performance and durability 
of your device. Let us know your preference, and we’ll ensure the best fit for your mobile repair needs.</p>
          </div>
        </article>
        <!--end single question-->
        <!--single question-->
        <article class="question">
          <!--question title-->
          <div class="question-title">
            <p>I found a cheaper repair service. Why should I choose ZaxeeFix for mobile repair?</p>
            <button type="button" class="question-btn">
              <span class="plus-icon">
                <i class="far fa-plus-square"></i>
              </span>
              <span class="minus-icon">
                <i class="far fa-minus-square"></i>
              </span>
            </button>
          </div>
          <!--question text-->
          <div class="question-text">
            <p>While you may find cheaper options, ZaxeeFix stands out for its premium service quality, certified technicians, and use of genuine parts.
               We have good number of years of experience, with over 1000 customer, ensuring trusted and reliable service across Kaduna and her environs.</p>
          </div>
        </article>
        <!--end single question-->
      </div>
    </section>


  <footer class="footer">
    <p>&copy; 2025 Zaxeefix.com. All rights reserved.</p>
    <p>Follow us on:
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </p>
  </footer>

  <script src="./admin/asset/js/index.js"></script>
  <script src="./admin/asset/js/check_session.js"></script>
</body>
</html>
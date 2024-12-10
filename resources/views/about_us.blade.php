<x-app-layout>
    <!-- Hero Section -->
    <section class="hero" id="hero">
        <div class="container mx-auto text-center">
            <h1>About Us</h1>
            <p>We are a passionate team dedicated to providing the best service to our customers.</p>
            <a href="/contact_us" class="cta-button">Contact Us</a>
        </div>
    </section>

    <!-- Business Section 1 -->
    <section class="business-section" id="business-section-1">
        <div class="text-content">
        <h2>Our Mission</h2>
            <p>At Justine Batter’s Studio, we aim to provide high-quality graphic design training that caters to all skill levels. Our mission is to help individuals expand their knowledge of graphic design, from print to web, offering a variety of courses that focus on both the creative and technical aspects of design.</p>
            <p>We offer dynamic one-on-one tuition, flexible online learning, and short courses designed to fit around your schedule. Our courses cover layout design, the importance of colours, professional design tools, and more. We want our students to feel comfortable and confident in their design journey.</p>
        </div>
        <div class="image-content">
            <img src="{{ asset('images/business-image-2.jpg') }}" alt="Business Image 1">
        </div>
    </section>

    <!-- Business Section 2 -->
    <section class="business-section reverse" id="business-section-2">
        <div class="text-content">
        <h2>Our Vision</h2>
            <p>We envision a world where everyone, from beginners to advanced graphic designers, can develop their skills in a supportive, relaxing environment. Our goal is to make graphic design education accessible and engaging through both in-person and online courses.</p>
            <p>Our training space includes everything from one-on-one sessions to group workshops, all tailored to help our students grow as creative professionals. We also offer a relaxed meeting room where you can enjoy a coffee while discussing ideas and receiving feedback on your designs.</p>
            
        </div>
        <div class="image-content">
            <img src="{{ asset('images/business-image-1.jpg') }}" alt="Business Image 2">
        </div>
    </section>



    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="container mx-auto text-center">
            <h2>What Our Clients Say</h2>
            <p>We take pride in delivering top-notch services. Here's what our clients have to say about their experience with us.</p>
            <div class="testimonials-cards">
                <!-- Testimonial 1 -->
                <div class="testimonial-card">
                    <img src="{{ asset('images/client-1.jpg') }}" alt="Client 1" class="testimonial-image">
                    <p class="testimonial-text">"Justine Batter’s Studio helped me improve my graphic design skills. The one-on-one sessions were incredibly helpful, and I feel much more confident with my design work now!"</p>
                    <h3 class="client-name">John Doe</h3>
                    <p class="client-position">Graphic Designer</p>
                </div>
                <!-- Testimonial 2 -->
                <div class="testimonial-card">
                    <img src="{{ asset('images/client-2.jpg') }}" alt="Client 2" class="testimonial-image">
                    <p class="testimonial-text">"The courses offered at Justine Batter’s Studio are fantastic! I learned so much in a short period, and the flexibility of the online classes made it easy to fit into my busy schedule."</p>
                    <h3 class="client-name">Jane Smith</h3>
                    <p class="client-position">Web Designer</p>
                </div>
                <!-- Testimonial 3 -->
                <div class="testimonial-card">
                    <img src="{{ asset('images/client-3.jpg') }}" alt="Client 3" class="testimonial-image">
                    <p class="testimonial-text">"I attended the group workshops, and the environment was amazing! I got great feedback on my work and made lasting connections with other designers."</p>
                    <h3 class="client-name">Michael Lee</h3>
                    <p class="client-position">UI/UX Designer</p>
                </div>
            </div>
        </div>
    </section>



    <style>
        /* Hero Section */
        #hero {
            background-color: #ffffff;
            text-align: center;
            padding: 80px 0;
            animation: fadeIn 2s ease-in-out;
        }

        #hero h1 {
            font-size: 3rem;
            color: #7F3FBF; /* Purple */
            animation: slideIn 1.5s ease-out;
        }

        #hero p {
            font-size: 1.2rem;
            color: #4A4A4A; /* Gray */
            margin-bottom: 30px;
            animation: fadeIn 2.5s ease-in-out;
        }

        .cta-button {
            background-color: #7F3FBF;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .cta-button:hover {
            background-color: #6b2a9b; /* Darker purple */
        }

        /* Business Sections */
        .business-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px 70px;
            animation: fadeInUp 2s ease-in-out;
        }

        .text-content{
            width: 45%;
            
        }
        .image-content{
            width: 45%;

        }

        .business-section.reverse {
            flex-direction: row-reverse;
        }

        .business-section h2 {
            font-size: 2.5rem;
            color: #7F3FBF;
        }

        .business-section p {
            font-size: 1.2rem;
            color: #4A4A4A;
            line-height: 1.5;
            animation: fadeInUp 2.5s ease-in-out;
        }

        .business-section img {
            width: 100%;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            animation: zoomIn 1.5s ease-in-out;
        }

        /* Animations */
        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            0% {
                opacity: 0;
                transform: translateX(-50px);
            }
            100% {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.9);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

         /* Testimonials Section */
         .testimonials-section {
            background-color: #f8f8f8;
            padding: 80px 0;
            text-align: center;
        }

        .testimonials-section h2 {
            font-size: 2.5rem;
            color: #7F3FBF;
            margin-bottom: 20px;
        }

        .testimonials-section p {
            font-size: 1.2rem;
            color: #4A4A4A;
            margin-bottom: 50px;
        }

        /* Testimonials Cards */
        .testimonials-cards {
            display: flex;
            justify-content: space-between;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .testimonial-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            width: 100%;
            max-width: 350px;
            transition: transform 0.3s ease-in-out;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
        }

        .testimonial-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            
        }

        .testimonial-text {
            font-size: 1rem;
            color: #4A4A4A;
            margin-bottom: 20px;
        }

        .client-name {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
        }

        .client-position {
            font-size: 1rem;
            color: #7F3FBF;
            margin-top: 5px;
        }


    </style>
</x-app-layout>

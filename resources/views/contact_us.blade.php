<x-app-layout>
    <!-- Contact Us Section -->
    @if (session('success'))
    <div class="flash-message success-message">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="flash-message error-message">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <section class="contact-us-section" id="contact-us">
        <div class="container mx-auto text-center">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you. Fill out the form below, and we'll get in touch with you as soon as possible.</p>

            <!-- Contact Form -->
            <div class="form-container">
                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="input-field" placeholder="Your Full Name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="input-field" placeholder="Your Email Address" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" class="input-field" rows="5" placeholder="Your Message" required></textarea>
                    </div>

                    <button type="submit" class="cta-button">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <style>
        /* Contact Us Section */
        .contact-us-section {
            background-color: #ffffff;
            padding: 80px 0;
            text-align: center;
            color: #4A4A4A;
        }

        .contact-us-section h2 {
            font-size: 2.5rem;
            color: #7F3FBF;
            margin-bottom: 20px;
        }

        .contact-us-section p {
            font-size: 1.2rem;
            color: #4A4A4A;
            margin-bottom: 40px;
        }

        /* Form Container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            max-width: 700px;
            margin: 0 auto;
            background-color: #f9f9f9;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        .form-group label {
            font-size: 1.1rem;
            color: #7F3FBF;
            display: block;
            margin-bottom: 5px;
        }

        .input-field {
            width: 100%;
            padding: 15px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            outline: none;
            box-sizing: border-box;
        }

        .input-field:focus {
            border-color: #7F3FBF;
            box-shadow: 0 0 5px rgba(127, 63, 191, 0.5);
        }

        .cta-button {
            background-color: #7F3FBF;
            color: white;
            padding: 15px 30px;
            font-weight: bold;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 1.1rem;
        }

        .cta-button:hover {
            background-color: #6b2a9b; /* Darker purple */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .contact-us-section {
                padding: 60px 20px;
            }

            .form-container {
                padding: 30px;
            }

            .cta-button {
                width: auto;
            }
        }


        .flash-message {
        padding: 15px;
        margin: 20px auto;
        border-radius: 5px;
        width: 100%;
        max-width: 600px;
        text-align: center;
        font-size: 1rem;
    }

    .success-message {
        background-color: #7F3FBF;
        color: #ffffff;
    }

    .error-message {
        background-color: #ff4d4d;
        color: #ffffff;
    }

    .error-message ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }


    </style>
</x-app-layout>

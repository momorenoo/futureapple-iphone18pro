# Project Overview
Build a high-end, futuristic landing page for a fictional product: **iPhone 18 Pro**.
Target URL/Deployment Path: `https://moreno-futureapple.tech/iPhone-18-pro/`
Creator/Developer: Moreno 

## Tech Stack & Architecture
- **Backend Framework:** CodeIgniter 4 (PHP) for a lightweight, fast, and secure foundation.
- **Frontend Styling:** Tailwind CSS (via CDN for simplicity in CI4 Views, or custom CSS) and Vanilla JavaScript for interactions.
- **Structure:** Standard MVC pattern. The AI should focus on creating the necessary Controller and the main View file.

## Design System & UI/UX Guidelines
- **Style:** Apple-esque, minimalist, premium, and futuristic.
- **Color Palette:** Deep blacks (True Dark Mode), titanium gray, space silver, and subtle glowing accent colors (like deep purple or glowing blue) to emphasize new technology.
- **Typography:** San Francisco (SF Pro) or Inter. Large, bold, and clean typography for headings.
- **Animations:** Smooth scroll reveals (Vanilla JS / AOS library), fade-ins for text, and parallax effects.
- **Responsiveness:** Must be perfectly responsive for both Mobile and Desktop.

## Page Structure
1. **Header / Navbar:**
   - Minimalist top navigation.
   - Logo: "FutureApple" (text or simple icon).
   - Links: Overview, Tech Specs, Camera, Pre-Order.
   - A distinct "Buy" or "Pre-Order" button in the top right.

2. **Hero Section:**
   - Big, bold headline: "iPhone 18 Pro. The Future is Here."
   - Sub-headline: "Mind-bending performance. Holographic display. Titanium redefined."
   - Primary Call to Action (CTA): "Pre-Order Now".
   - Visual: A large, sleek mockup or abstract 3D render of a futuristic smartphone (use CSS/HTML elements if images are absent).

3. **Features Section (Bento Grid Layout):**
   - Use a modern Bento Grid UI (Tailwind Grid) to display key imaginary features:
     - **A20 Bionic Chip:** "Quantum-level processing."
     - **Holo-Display:** "Interact with 3D projections directly from your screen."
     - **NeverCharge Battery:** "Powered by ambient kinetic energy. Up to 1 week of battery life."
     - **Hyper-Lens Camera:** "200MP sensor with AI-driven planetary zoom."

4. **Tech Specs Summary:**
   - A clean table or list comparing standard and Pro models.

5. **Footer:**
   - Copyright © 2026 Moreno - FutureApple Tech.
   - Links to social media or academic project details.
   - Display the current active URL path for reference: `moreno-futureapple.tech/iPhone-18-pro/`

## Technical Requirements for the AI
1. **Controller:** Provide the PHP code for the CI4 Controller (e.g., `Iphone.php`) that serves the view.
2. **View:** Provide the complete HTML/PHP code for the CI4 View (e.g., `iphone_18_pro.php`).
3. **Styling:** Integrate Tailwind CSS classes directly into the View file.
4. **Clean Code:** Ensure the PHP and HTML structure is clean, modular, and ready to be placed inside a standard CodeIgniter 4 `app/` directory structure.
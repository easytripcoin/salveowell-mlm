# SalveoWell MLM Web Application Directory Structure

## Root Directory Structure

```
salveowell-mlm/
├── index.php                          # Main landing page
├── config/                            # Configuration files
│   ├── database.php                   # Database connection config
│   ├── constants.php                  # App constants & settings
│   ├── stripe_config.php              # Stripe API configuration
│   ├── gcash_config.php               # GCash payment configuration
│   ├── sms_config.php                 # SMS OTP configuration
│   ├── email_config.php               # Email/SMTP configuration
│   └── shipping_config.php            # Logistics API configuration
├── includes/                          # Shared includes
│   ├── header.php                     # Common HTML header
│   ├── footer.php                     # Common HTML footer
│   ├── sidebar.php                    # Dashboard sidebar
│   ├── functions.php                  # Common utility functions
│   ├── security.php                   # Security functions
│   ├── session_check.php              # Session validation
│   └── db_functions.php               # Database helper functions
├── assets/                            # Static assets
│   ├── css/
│   │   ├── bootstrap.min.css          # Bootstrap 5 CSS
│   │   ├── style.css                  # Custom styles
│   │   ├── dashboard.css              # Dashboard specific styles
│   │   ├── genealogy.css              # Tree visualization styles
│   │   └── responsive.css             # Mobile responsive styles
│   ├── js/
│   │   ├── bootstrap.bundle.min.js    # Bootstrap 5 JS
│   │   ├── jquery.min.js              # jQuery library
│   │   ├── d3.min.js                  # D3.js for tree visualization
│   │   ├── chart.js                   # Chart.js for analytics
│   │   ├── main.js                    # Main application JS
│   │   ├── dashboard.js               # Dashboard functionality
│   │   ├── genealogy.js               # Tree visualization JS
│   │   ├── payment.js                 # Payment processing JS
│   │   └── validation.js              # Form validation JS
│   ├── images/
│   │   ├── logo.png                   # Company logo
│   │   ├── products/                  # Product images
│   │   ├── avatars/                   # User avatars
│   │   ├── backgrounds/               # Background images
│   │   └── icons/                     # Various icons
│   └── uploads/                       # User uploaded files
│       ├── kyc/                       # KYC documents
│       ├── profiles/                  # Profile pictures
│       └── temp/                      # Temporary files
├── auth/                              # Authentication system
│   ├── login.php                      # Login form & processing
│   ├── register.php                   # Registration form
│   ├── register_process.php           # Registration processing
│   ├── forgot_password.php            # Password reset request
│   ├── reset_password.php             # Password reset form
│   ├── verify_email.php               # Email verification
│   ├── verify_sms.php                 # SMS OTP verification
│   ├── kyc_upload.php                 # KYC document upload
│   ├── logout.php                     # Logout processing
│   └── social_login.php               # Social media login
├── dashboard/                         # Member dashboard
│   ├── index.php                      # Dashboard home
│   ├── profile.php                    # Profile management
│   ├── edit_profile.php               # Profile editing
│   ├── genealogy.php                  # Binary tree viewer
│   ├── wallet.php                     # Wallet & earnings
│   ├── payouts.php                    # Payout history
│   ├── orders.php                     # Order history
│   ├── share_tools.php                # Sharing tools
│   ├── landing_builder.php            # Landing page builder
│   ├── rank_status.php                # Rank & qualifications
│   ├── team_volume.php                # Team volume reports
│   ├── autoship.php                   # Subscription management
│   └── support.php                    # Support tickets
├── products/                          # Product management
│   ├── catalog.php                    # Product catalog
│   ├── product_detail.php             # Product details page
│   ├── cart.php                       # Shopping cart
│   ├── checkout.php                   # Checkout process
│   ├── order_confirmation.php         # Order confirmation
│   ├── bulk_order.php                 # Bulk order upload
│   └── inventory_check.php            # Stock availability
├── payments/                          # Payment processing
│   ├── stripe_process.php             # Stripe payment handler
│   ├── gcash_process.php              # GCash payment handler
│   ├── payment_success.php            # Payment success page
│   ├── payment_failed.php             # Payment failure page
│   ├── webhook_stripe.php             # Stripe webhooks
│   └── webhook_gcash.php              # GCash webhooks
├── compensation/                      # Compensation engine
│   ├── calculate_rsc.php              # Retail sales commission
│   ├── calculate_binary.php           # Binary bonus calculation
│   ├── process_payouts.php            # Weekly payout processing
│   ├── rank_advancement.php           # Rank qualification check
│   ├── compression.php                # Tree compression script
│   └── bonus_history.php              # Bonus calculation logs
├── logistics/                         # Dropship & fulfillment
│   ├── order_fulfillment.php          # Order processing
│   ├── shipping_webhook.php           # Logistics API webhooks
│   ├── delivery_tracking.php          # Package tracking
│   ├── cod_confirmation.php           # COD confirmation
│   └── return_processing.php          # Returns & refunds
├── marketing/                         # Marketing tools
│   ├── landing_generator.php          # Dynamic landing pages
│   ├── fb_ads_toolkit.php             # Facebook ads tools
│   ├── email_campaigns.php            # Email marketing
│   ├── autoresponder.php              # Email sequences
│   ├── utm_builder.php                # UTM parameter builder
│   ├── qr_generator.php               # QR code generator
│   └── social_share.php               # Social sharing tools
├── admin/                             # Admin panel
│   ├── login.php                      # Admin login
│   ├── dashboard.php                  # Admin dashboard
│   ├── users.php                      # User management
│   ├── products.php                   # Product management
│   ├── orders.php                     # Order management
│   ├── payouts.php                    # Payout management
│   ├── genealogy_admin.php            # Tree management
│   ├── compensation_config.php        # Comp plan settings
│   ├── reports.php                    # Business reports
│   ├── analytics.php                  # Analytics dashboard
│   ├── settings.php                   # System settings
│   ├── audit_trail.php                # Audit logs
│   └── bulk_operations.php            # Bulk user operations
├── api/                               # API endpoints
│   ├── user_api.php                   # User data API
│   ├── genealogy_api.php              # Tree data API
│   ├── product_api.php                # Product data API
│   ├── payment_api.php                # Payment processing API
│   ├── shipping_api.php               # Shipping integration API
│   ├── analytics_api.php              # Analytics data API
│   └── webhook_handler.php            # Generic webhook handler
├── replicated/                        # Replicated sites system
│   ├── site_generator.php             # Generate member sites
│   ├── template_engine.php            # Template processing
│   ├── subdomain_handler.php          # Subdomain routing
│   └── content_manager.php            # Content management
├── cron/                              # Scheduled tasks
│   ├── daily_tasks.php                # Daily maintenance
│   ├── weekly_payouts.php             # Weekly payout run
│   ├── monthly_compression.php        # Monthly tree compression
│   ├── email_queue.php                # Email queue processing
│   ├── rank_calculation.php           # Rank advancement
│   └── cleanup.php                    # System cleanup
├── templates/                         # Email & page templates
│   ├── emails/
│   │   ├── welcome.html               # Welcome email
│   │   ├── payout_notification.html   # Payout notification
│   │   ├── rank_advancement.html      # Rank advancement
│   │   ├── order_confirmation.html    # Order confirmation
│   │   └── password_reset.html        # Password reset
│   ├── landing_pages/
│   │   ├── default_landing.html       # Default landing template
│   │   ├── product_focus.html         # Product-focused template
│   │   └── income_opportunity.html    # Opportunity-focused template
│   └── certificates/
│       ├── rank_certificate.html      # Rank achievement certificate
│       └── achievement_badge.html     # Achievement badges
├── database/                          # Database related files
│   ├── migrations/
│   │   ├── 001_initial_setup.sql      # Initial database schema
│   │   ├── 002_compensation_tables.sql # Compensation tables
│   │   ├── 003_product_system.sql     # Product management
│   │   ├── 004_payment_integration.sql # Payment tables
│   │   ├── 005_marketing_tools.sql    # Marketing features
│   │   └── 006_multi_currency.sql     # Multi-currency support
│   ├── seeds/
│   │   ├── default_products.sql       # Default product data
│   │   ├── rank_structure.sql         # Rank definitions
│   │   └── compensation_config.sql    # Default comp plan
│   └── backups/                       # Database backups
├── logs/                              # Application logs
│   ├── error.log                      # Error logs
│   ├── access.log                     # Access logs
│   ├── payout.log                     # Payout processing logs
│   ├── security.log                   # Security events
│   └── api.log                        # API request logs
├── docs/                              # Documentation
│   ├── api_documentation.md           # API documentation
│   ├── database_schema.md             # Database documentation
│   ├── deployment_guide.md            # Deployment instructions
│   ├── compensation_plan.md           # Compensation plan details
│   └── user_manual.md                 # User manual
└── tests/                             # Test files
    ├── unit/                          # Unit tests
    ├── integration/                   # Integration tests
    └── sample_data/                   # Sample test data
```

## Key File Descriptions

### Core Configuration Files
- **config/database.php**: MySQL connection parameters and PDO setup
- **config/constants.php**: Application-wide constants (commission rates, ranks, etc.)
- **includes/functions.php**: Core utility functions (sanitization, validation, formatting)
- **includes/security.php**: Security functions (CSRF protection, input validation)

### Authentication System
- **auth/register.php**: Multi-step registration with referral link capture
- **auth/kyc_upload.php**: KYC document upload and verification
- **auth/verify_email.php** & **auth/verify_sms.php**: Two-factor verification

### Dashboard Core
- **dashboard/genealogy.php**: Binary tree visualization with D3.js
- **dashboard/wallet.php**: Real-time commission tracking
- **dashboard/share_tools.php**: Referral link sharing and QR codes

### Compensation Engine
- **compensation/calculate_binary.php**: Binary bonus calculation with powerleg algorithm
- **compensation/process_payouts.php**: Weekly payout processing
- **compensation/rank_advancement.php**: Automatic rank qualification checking

### Product & Commerce
- **products/catalog.php**: Multi-product catalog with package variants
- **products/checkout.php**: Integrated Stripe/GCash checkout
- **logistics/order_fulfillment.php**: Dropship order processing

### Marketing Tools
- **marketing/landing_generator.php**: Dynamic replicated site generation
- **marketing/autoresponder.php**: Email sequence automation
- **replicated/subdomain_handler.php**: Wildcard subdomain routing

### Admin Panel
- **admin/genealogy_admin.php**: Tree management and placement tools
- **admin/compensation_config.php**: Dynamic compensation plan configuration
- **admin/reports.php**: Business intelligence and reporting

### Multi-Currency & Globalization
- **payments/**: Multi-currency payment processing
- **database/migrations/006_multi_currency.sql**: Currency and regional tables

## Technology Stack Integration

### Frontend
- **Bootstrap 5**: Responsive UI framework
- **jQuery**: DOM manipulation and AJAX
- **D3.js**: Binary tree visualization
- **Chart.js**: Analytics dashboards

### Backend
- **PHP 8.x**: Server-side processing (purely procedural)
- **MySQL 8.x**: Database with InnoDB storage engine
- **PDO**: Database abstraction layer

### Payment Processing
- **Stripe PHP SDK**: Credit card processing
- **GCash API**: Philippine digital wallet
- **Webhook handlers**: Real-time payment confirmations

### Communication
- **SendGrid/Mailgun**: Transactional emails
- **SMS Gateway API**: OTP verification
- **WhatsApp Business API**: Marketing notifications

This structure supports all phases 1-6 requirements while maintaining a clean, scalable architecture that can handle the complex MLM business logic and high transaction volumes.# salveowell-mlm

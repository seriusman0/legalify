<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleBlogSeeder extends Seeder
{
    public function run()
    {
        // Create admin user if it doesn't exist
        $admin = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        Blog::create([
            'title' => 'Understanding Legal Rights and Responsibilities in Business',
            'content' => "Legal compliance is a crucial aspect of running a successful business. This comprehensive guide will help you understand your legal rights and responsibilities as a business owner.

Understanding Business Law Fundamentals

Business law encompasses various legal areas that affect how a company operates. Here are the key aspects every business owner should know:

1. Business Formation and Structure
- Choosing the right business structure (LLC, Corporation, Partnership)
- Registration requirements and procedures
- Tax implications of different business structures
- Legal documentation and record-keeping requirements

2. Employment Law
- Hiring practices and anti-discrimination laws
- Workplace safety regulations
- Wage and hour requirements
- Employee benefits and rights
- Worker classification (employees vs. contractors)

3. Contract Law
- Essential elements of valid contracts
- Common business contracts
- Contract negotiation and drafting
- Breach of contract and remedies
- Contract termination and modification

4. Intellectual Property Protection
- Trademarks and brand protection
- Patents for inventions and innovations
- Copyrights for creative works
- Trade secrets and confidentiality
- IP licensing and enforcement

5. Consumer Protection Laws
- Fair advertising practices
- Product liability and safety
- Consumer privacy rights
- Warranty obligations
- Return and refund policies

Best Practices for Legal Compliance

To maintain legal compliance, consider implementing these practices:

1. Regular Legal Audits
- Review current practices
- Update policies and procedures
- Identify potential risks
- Implement corrective measures

2. Documentation Management
- Maintain organized records
- Store documents securely
- Implement retention policies
- Ensure accessibility

3. Employee Training
- Regular compliance training
- Policy awareness sessions
- Documentation of training
- Updates on new regulations

4. Risk Management
- Insurance coverage review
- Contract review procedures
- Dispute resolution protocols
- Emergency response plans

Conclusion

Understanding and complying with business laws is essential for protecting your company and ensuring its success. Regular review and updates of your legal practices will help maintain compliance and reduce risks.

Remember to consult with legal professionals for specific advice regarding your business situation, as laws and regulations can vary by location and industry.",
            'slug' => Str::slug('Understanding Legal Rights and Responsibilities in Business'),
            'category' => 'Business Law',
            'user_id' => $admin->id
        ]);
    }
}

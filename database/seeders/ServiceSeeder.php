<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'RAG System Implementation',
                'slug' => 'rag-system-implementation',
                'description' => 'Build production-ready Retrieval-Augmented Generation systems that process millions of documents with high accuracy and low latency.',
                'long_description' => 'I design and implement custom RAG (Retrieval-Augmented Generation) systems that enable your organization to leverage its knowledge base effectively. From architecture design to production deployment, I handle every aspect of building robust, scalable RAG solutions.',
                'icon' => 'cube',
                'features' => [
                    'Custom RAG architecture design',
                    'Vector database setup (Pinecone, Weaviate, ChromaDB)',
                    'Embedding model optimization',
                    'Hybrid search implementation',
                    'Performance tuning & monitoring',
                    'Production deployment'
                ],
                'price_range' => 'Starting at $5,000',
                'duration' => '4-8 weeks',
                'order' => 1,
                'active' => true,
            ],
            [
                'title' => 'LLM Integration',
                'slug' => 'llm-integration',
                'description' => 'Seamlessly integrate GPT-4, Claude, or other LLMs into your applications with proper error handling, streaming, and cost optimization.',
                'long_description' => 'Integrate powerful Large Language Models into your existing applications or build new AI-powered features. I handle all aspects of LLM integration including prompt engineering, API implementation, streaming responses, and cost optimization.',
                'icon' => 'sparkles',
                'features' => [
                    'API integration (OpenAI, Anthropic, Google)',
                    'Prompt engineering & optimization',
                    'Function calling implementation',
                    'Streaming responses',
                    'Rate limiting & error handling',
                    'Cost tracking & optimization'
                ],
                'price_range' => 'Starting at $3,000',
                'duration' => '2-4 weeks',
                'order' => 2,
                'active' => true,
            ],
            [
                'title' => 'AI Agent Development',
                'slug' => 'ai-agent-development',
                'description' => 'Create autonomous AI agents that can research, write, code, and collaborate to accomplish complex tasks.',
                'long_description' => 'Design and build multi-agent systems where specialized AI agents work together to solve complex problems. These systems can handle research, content creation, code generation, and more with minimal human intervention.',
                'icon' => 'users',
                'features' => [
                    'Multi-agent system architecture',
                    'Agent role definition & specialization',
                    'Inter-agent communication',
                    'Tool integration & function calling',
                    'Memory & context management',
                    'Workflow orchestration'
                ],
                'price_range' => 'Starting at $8,000',
                'duration' => '6-10 weeks',
                'order' => 3,
                'active' => true,
            ],
            [
                'title' => 'Fine-tuning & Custom Models',
                'slug' => 'fine-tuning-custom-models',
                'description' => 'Fine-tune LLMs on your specific data for improved performance and specialized behavior.',
                'long_description' => 'Adapt pre-trained models to your specific use case through fine-tuning. This results in better performance, reduced costs, and models that understand your domain-specific terminology and requirements.',
                'icon' => 'sliders',
                'features' => [
                    'Dataset preparation & curation',
                    'Model selection & evaluation',
                    'Fine-tuning pipeline setup',
                    'Hyperparameter optimization',
                    'Performance evaluation',
                    'Model deployment'
                ],
                'price_range' => 'Starting at $7,000',
                'duration' => '4-6 weeks',
                'order' => 4,
                'active' => true,
            ],
            [
                'title' => 'Semantic Search Engine',
                'slug' => 'semantic-search-engine',
                'description' => 'Build intelligent search systems that understand user intent and deliver highly relevant results.',
                'long_description' => 'Implement semantic search capabilities that go beyond keyword matching. Using advanced embedding models and hybrid search strategies, I create search systems that truly understand what users are looking for.',
                'icon' => 'search',
                'features' => [
                    'Semantic search implementation',
                    'Hybrid search (keyword + vector)',
                    'Query understanding & expansion',
                    'Relevance ranking algorithms',
                    'Faceted search & filtering',
                    'Performance optimization'
                ],
                'price_range' => 'Starting at $6,000',
                'duration' => '4-7 weeks',
                'order' => 5,
                'active' => true,
            ],
            [
                'title' => 'AI Consulting & Strategy',
                'slug' => 'ai-consulting-strategy',
                'description' => 'Strategic guidance on AI adoption, technology selection, and implementation planning.',
                'long_description' => 'Get expert advice on how to leverage AI in your business. I help you identify opportunities, choose the right technologies, plan implementations, and avoid common pitfalls. Perfect for organizations new to AI or planning major AI initiatives.',
                'icon' => 'chart',
                'features' => [
                    'AI readiness assessment',
                    'Use case identification & prioritization',
                    'Technology stack recommendations',
                    'ROI analysis & projections',
                    'Implementation roadmaps',
                    'Team training & workshops'
                ],
                'price_range' => 'Starting at $2,500',
                'duration' => '1-3 weeks',
                'order' => 6,
                'active' => true,
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create($serviceData);
        }
    }
}

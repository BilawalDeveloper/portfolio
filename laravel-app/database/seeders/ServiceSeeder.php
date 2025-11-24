<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'features' => [
                    'Custom RAG architecture design',
                    'Vector database setup (Pinecone, Weaviate, ChromaDB)',
                    'Embedding model optimization',
                    'Hybrid search implementation',
                    'Performance tuning & monitoring',
                    'Production deployment',
                ],
                'pricing' => 'Starting at $5,000',
                'order' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'LLM Integration',
                'slug' => 'llm-integration',
                'description' => 'Seamlessly integrate GPT-4, Claude, or other LLMs into your applications with proper error handling, streaming, and cost optimization.',
                'features' => [
                    'API integration (OpenAI, Anthropic, Google)',
                    'Prompt engineering & optimization',
                    'Function calling implementation',
                    'Streaming responses',
                    'Rate limiting & error handling',
                    'Cost tracking & optimization',
                ],
                'pricing' => 'Starting at $3,000',
                'order' => 2,
                'is_published' => true,
            ],
            [
                'title' => 'AI Agent Development',
                'slug' => 'ai-agent-development',
                'description' => 'Create autonomous AI agents with multi-step reasoning, tool use, and complex workflow orchestration.',
                'features' => [
                    'Multi-agent system architecture',
                    'Tool calling & function execution',
                    'State management & memory',
                    'Agent orchestration (LangGraph)',
                    'Error recovery & monitoring',
                    'Production-ready deployment',
                ],
                'pricing' => 'Starting at $7,000',
                'order' => 3,
                'is_published' => true,
            ],
            [
                'title' => 'Fine-tuning & Custom Models',
                'slug' => 'fine-tuning-custom-models',
                'description' => 'Fine-tune LLMs for your specific domain or use case. Optimize for accuracy, speed, and cost.',
                'features' => [
                    'Dataset preparation & curation',
                    'Fine-tuning GPT-3.5/4, Claude, Llama',
                    'Hyperparameter optimization',
                    'Model evaluation & testing',
                    'Deployment & inference optimization',
                    'Ongoing model monitoring',
                ],
                'pricing' => 'Starting at $10,000',
                'order' => 4,
                'is_published' => true,
            ],
            [
                'title' => 'Semantic Search Engine',
                'slug' => 'semantic-search-engine',
                'description' => 'Build intelligent search systems using embeddings, semantic similarity, and hybrid search techniques.',
                'features' => [
                    'Embedding model selection & training',
                    'Vector database implementation',
                    'Hybrid search (semantic + keyword)',
                    'Ranking & relevance tuning',
                    'Query understanding & expansion',
                    'Performance optimization',
                ],
                'pricing' => 'Starting at $4,000',
                'order' => 5,
                'is_published' => true,
            ],
            [
                'title' => 'AI Consulting & Strategy',
                'slug' => 'ai-consulting-strategy',
                'description' => 'Get expert guidance on AI strategy, architecture decisions, technology selection, and implementation planning.',
                'features' => [
                    'AI strategy & roadmap development',
                    'Technology stack recommendations',
                    'Architecture design & review',
                    'Team training & mentorship',
                    'Code review & best practices',
                    'Performance optimization',
                ],
                'pricing' => '$200/hour',
                'order' => 6,
                'is_published' => true,
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}

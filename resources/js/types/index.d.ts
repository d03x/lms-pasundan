export interface Auth {
    user: User;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
};

export interface User {
    id: number;
    role:string,
    nama : string,
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
    kelas?:{
        nama : string,
        id:string,
    }
}
